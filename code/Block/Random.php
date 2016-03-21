<?php
class Magetest_Yp_Block_Random extends Magetest_Yp_Block_List
{

    public function getRandomQuestion() {
        $collection = $this->getFaqList()
            ->addFieldToFilter('answer',array('neq' => ''));
        $idsArray = $collection->getAllIds();
        if(count($idsArray) > 1){
            $id = $this->getRandomValue($idsArray);
        } elseif(count($idsArray) == 1) {
            $id = $idsArray[0];
        } else {
            return false;
        }
        return $collection->getItemById($id);
    }

    protected function getRandomValue(array $array) {
        return $array[rand(0,count($array)-1)];
    }
}