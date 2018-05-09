<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $email
 * @property string $First_Name
 * @property string $Surname
 * @property string $Department
 * @property string $Job_Title
 * @property string $Level
 * @property string $password
 *
 * @property \App\Model\Entity\TasksUser[] $tasks_users
 * @property \App\Model\Entity\TeamsUser[] $teams_users
 */
class User extends Entity
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
        'email' => true,
        'First_Name' => true,
        'Surname' => true,
        'Department' => true,
        'Job_Title' => true,
        'Level' => true,
        'password' => true,
        'tasks_users' => true,
        'teams_users' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
    protected function _setPassword($value)
   {
       if (strlen($value)) {
           $hasher = new DefaultPasswordHasher();

           return $hasher->hash($value);
       }
   }
}
