<?php


namespace Voice\Model;

use Voice\Entity\PositionEntity;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\AdapterAwareInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Class UserTable
 * @package Voice\Model
 */
class PositionTable extends AbstractTableGateway implements AdapterAwareInterface
{

    /**
     * @var string
     */
    protected $table = 'position';

    /**
     * @param Adapter $adapter
     */
    public function setDbAdapter(Adapter $adapter)
    {

        $this->adapter = $adapter;

        $this->resultSetPrototype = new HydratingResultSet(new ClassMethods(), new PositionEntity());

        $this->initialize();
    }


    /**
     * @param PositionEntity $positionEntity
     * @return bool|int
     */
    public function save(PositionEntity $positionEntity)
    {
        $id = (int)$positionEntity->getId();

        $saveData = array_filter($this->resultSetPrototype->getHydrator()->extract($positionEntity), function ($value) {
            return $value !== null;
        });

        if (!$id) {
            return $this->insert($saveData) ? $this->lastInsertValue : false;
        }

        return $this->update($saveData, array('id' => $id));
    }


}