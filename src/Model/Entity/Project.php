<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Project Entity
 *
 * @property int $id
 * @property string $Name
 * @property string $Status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $Deadline
 *
 * @property \App\Model\Entity\Task[] $tasks
 */
class Project extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'Name' => true,
        'Status' => true,
        'created' => true,
        'Deadline' => true,
        'tasks' => true
    ];
}
