<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Task Entity
 *
 * @property int $id
 * @property string $Description
 * @property \Cake\I18n\FrozenTime $Start_Time
 * @property \Cake\I18n\FrozenTime $End_Date
 * @property string $Status
 * @property int $Next_TaskID
 * @property int $project_id
 *
 * @property \App\Model\Entity\Project $project
 * @property \App\Model\Entity\TasksUser[] $tasks_users
 */
class Task extends Entity
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
      'name' => true,
        'Description' => true,
        'Start_Time' => true,
        'End_Date' => true,
        'Status' => true,
        'Next_TaskID' => true,
        'project_id' => true,
        'project' => true,
        'tasks_users' => true
    ];

}
