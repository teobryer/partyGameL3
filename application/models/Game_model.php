<?php

class JsonContent implements JsonSerializable
{

    public $tagList;

    public $inventory;

    function __construct($tagList, $inventory)
    {
        $this->tagList = $tagList;
        $this->inventory = $inventory;
    }

    public function jsonSerialize()
    {
        return [
            'tagList' => $this->getTagList(),
            'inventory' => $this->getInventory()
        ];
    }

    public function getTagList()
    {
        return $this->tagList;
    }

    public function getInventory()
    {
        return $this->inventory;
    }
}

class Forfeit
{

    private $idForfeit;

    private $textForfeit;

    private $nbConcerned;

    private $tagList;

    private $inventory;

    function __construct($id, $text, $nb, $list, $list2)
    {
        $this->idForfeit = $id;
        $this->textForfeit = $text;
        $this->nbConcerned = $nb;
        $this->tagList = $list;
        $this->inventory = $list2;
    }

    public function getTextForfeit()
    {
        return $this->textForfeit;
    }

    public function setTextForfeit($newText)
    {
        $this->textForfeit = $newText;
    }

    public function getIdForfeit()
    {
        return $this->idForfeit;
    }

    public function setIdForfeit($newId)
    {
        $this->idForfeit = $newId;
    }

    public function getNbConcerned()
    {
        return $this->nbConcerned;
    }

    public function setNbConcerned($newNb)
    {
        $this->nbConcerned = $newNb;
    }

    public function getTagList()
    {
        return $this->tagList;
    }

    public function setTagList($newList)
    {
        $this->tagList = $newList;
    }
}

class Game_Model extends CI_Model
{

    private $sexualOrientationDefault;

    private $inventory;

    public function __construct()
    {
        $this->load->database();
        $this->sexualOrientationDefault = "hetero";
    }

    public function jsonContent()
    {
        $inventaire = array(
            "cuillere",
            "farine"
        );
        $tags = array(
            "bouffe",
            "action"
        );

        $obj = new JsonContent($tags, $inventaire);

        print_r(json_encode($obj));
    }

    public function setSexualOrientationDefault($newSexualOrientationDefault)
    {
        $this->sexualOrientationDefault = $newSexualOrientationDefault;
    }

    public function getNbForfeit($nb)
    {}

    public function getForfeitWandWContext($context = null)
    {
        if ($context == null) {
            if ($this->sexualOrientationDefault == 'homo') {
                // print_r('homo');
            } else {
                // print_r('hetero');
            }
        } 
        else {
            if ($context == 'homo') {
                // print_r('homo');
            } 
            else {
                // print_r('hetero');
            }
        }
    }

    public function getForfeitMandMContexte($men1, $men2, $context = null)
    {}

    public function comptTotalForfeit()
    {
        $this->db->select('COUNT(*) as total');
        $this->db->from('FORFEIT');
        $this->db->where('valid = true ');
        $query = $this->db->get();

        return $query->result_array()[0]['total'];
    }

    public function getForfeitById($id)
    {
        $this->db->select('*');
        $this->db->from('FORFEIT');
        $this->db->where('valid = true AND idForfeit=' . $id);
        $query = $this->db->get();

        return $this->transformQueryToForfeit($query);
    }

    public function transformQueryToForfeit($query)
    {
        if ($query->result_array() != null) {

            $jsonContent = $query->result_array()[0]['jsonContent'];
            $id = $query->result_array()[0]['idForfeit'];
            $text = $query->result_array()[0]['textForfeit'];
            $nb = $query->result_array()[0]['nbConcerned'];

            $obj = (json_decode($jsonContent));

            $inventory = ($obj->inventory);
            $tags = ($obj->tagList);

            return new Forfeit($id, $text, $nb, $tags, $inventory);
        } 
        else {
            return new Forfeit(1, "Trop de restrictions, revoyez les tags et/ou inventaire exclu de %1", 1, array(
                "Erreur"
            ), array());
        }
    }

    public function getForfeitByIncludingTags($tagList)
    {
        $this->db->select('*');
        $this->db->from('FORFEIT');
        $this->db->where("valid = true AND  JSON_CONTAINS(jsonContent,'" . $this->transformArrayForJsonContains($tagList) . "' , '$.tagList')");
        $this->db->order_by('rand()');
        $this->db->limit(1);
        $query = $this->db->get();
        return $this->transformQueryToForfeit($query);
    }

    public function getForfeitByExcludingTags($tagList)
    {
        $this->db->select('*');
        $this->db->from('FORFEIT');
        $this->db->where("valid = true AND not JSON_CONTAINS(jsonContent,'" . $this->transformArrayForJsonContains($tagList) . "' , '$.tagList')");
        $this->db->order_by('rand()');
        $this->db->limit(1);
        $query = $this->db->get();
        return $this->transformQueryToForfeit($query);
    }

    public function getForfeitByIncludingInventory($inventory)
    {
        $this->db->select('*');
        $this->db->from('FORFEIT');
        $this->db->where("valid = true AND  JSON_CONTAINS(jsonContent,'" . $this->transformArrayForJsonContains($inventory) . "' , '$.inventory')");
        $this->db->order_by('rand()');
        $this->db->limit(1);
        $query = $this->db->get();
        return $this->transformQueryToForfeit($query);
    }

    public function getForfeitByExcludingInventory($inventory)
    {
        $this->db->select('*');
        $this->db->from('FORFEIT');
        $this->db->where("valid = true AND not JSON_CONTAINS(jsonContent,'" . $this->transformArrayForJsonContains($inventory) . "' , '$.inventory')");
        $this->db->order_by('rand()');
        $this->db->limit(1);
        $query = $this->db->get();
        return $this->transformQueryToForfeit($query);
    }

    public function getForfeitByIncludingAllTagsOnly($tagList)
    {
        $reverse = $this->ReverseListTag($tagList);
        print_r($this->transformArrayForJsonContains($reverse));
        // print_r($reverse);
        $this->db->select('*');
        $this->db->from('FORFEIT');
        $this->db->where("valid = true and JSON_CONTAINS(jsonContent,'" . $this->transformArrayForJsonContains($tagList) . "' , '$.tagList') AND " . $this->ExclusionTags($reverse));
        $this->db->order_by('rand()');
        $this->db->limit(1);
        $query = $this->db->get();
        return $this->transformQueryToForfeit($query);
    }

    public function ReverseListTag($tagList)
    {
        $whereCondition = '';
        foreach ($tagList as $oneTag) {
            $whereCondition = $whereCondition . " textTag !='" . $oneTag . "' AND";
        }
        $whereCondition = substr($whereCondition, 0, - 3);

        $this->db->select('*');
        $this->db->from('TAG');
        $this->db->where($whereCondition);
        $query = $this->db->get();
        $reverseList = array();
        foreach ($query->result_array() as $row) {
            $reverseList[] = $row['textTag'];
        }

        return $reverseList;
    }

    public function ExclusionTags($tagList)
    {
        $whereCondition = '';
        foreach ($tagList as $oneTag) {
            $whereCondition = $whereCondition . ' not JSON_CONTAINS(jsonContent,' . "'" . '["' . $oneTag . '"]' . "'" . ' , ' . "'$.tagList'" . ') AND';
        }
        $whereCondition = substr($whereCondition, 0, - 3);

        return $whereCondition;
    }

    public function ExclusionInventory($inventory)
    {
        $whereCondition = '';
        foreach ($inventory as $oneItem) {
            $whereCondition = $whereCondition . ' not JSON_CONTAINS(jsonContent,' . "'" . '["' . $oneItem . '"]' . "'" . ' , ' . "'$.inventory'" . ') AND';
        }
        $whereCondition = substr($whereCondition, 0, - 3);

        return $whereCondition;
    }

    public function transformArrayForJsonContains($list)
    {
        $arrayString = '[';
        foreach ($list as $oneItem) {
            $arrayString = $arrayString . '"' . $oneItem . '",';
        }
        $arrayString = substr($arrayString, 0, - 1);
        $arrayString = $arrayString . ']';
        return $arrayString;
    }

    public function getForfeitAdvanded($nbConcernedMax, $tagListExlude, $inventoryExclude)
    {
        $this->db->select('*');
        $this->db->from('FORFEIT');
        $this->db->where($this->ExclusionInventory($inventoryExclude) . " AND " . $this->ExclusionTags($tagListExlude) . " AND nbConcerned <=" . $nbConcernedMax);
        $this->db->order_by('rand()');
        $this->db->limit(1);
        $query = $this->db->get();
        return $this->transformQueryToForfeit($query);
    }
}

?>
