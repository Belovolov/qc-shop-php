<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher; 

/**
 * User Entity
 *
 * @property string $Id
 * @property string $UserName
 * @property string $FirstName
 * @property string $LastName
 * @property string $Email
 * @property int $EmailConfirmed
 * @property string $PasswordHash
 * @property string $Role
 * @property string $AddressLine1
 * @property string $AddressLine2
 * @property string $City
 * @property string $ZipCode
 * @property string $HomeNumber
 * @property string $MobileNumber
 * @property string $WorkNumber
 * @property int $IsLocked
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
        'UserName' => true,
        'FirstName' => true,
        'LastName' => true,
        'Email' => true,
        'EmailConfirmed' => true,
        'PasswordHash' => true,
        'Role' => true,
        'AddressLine1' => true,
        'AddressLine2' => true,
        'City' => true,
        'ZipCode' => true,
        'HomeNumber' => true,
        'MobileNumber' => true,
        'WorkNumber' => true,
        'IsLocked' => true,
        'ConfirmToken'=>true
    ];

    protected function _setPasswordHash($value)
    {
        if (strlen($value)) {
            $hasher = new DefaultPasswordHasher();

            return $hasher->hash($value);
        }
    }

    protected function _getFullName()
    {
        $first = $this->_properties['FirstName'];
        $last = $this->_properties['LastName'];

        return (empty($first) ? '' : $first . ' ') .
               (empty($last) ? '' : $last . ' ');
    }
    protected function _getAddress()
    {
        $line1 = $this->_properties['AddressLine1'];
        $line2 = $this->_properties['AddressLine2'];
        $city = $this->_properties['City'];
        $zip = $this->_properties['ZipCode'];
        
        return  (empty($line1) ? '' : $line1 . ', ') .
                (empty($line2) ? '' : $line2 . ', ') .
                (empty($city) ? '' : $city . ', ') .
                (empty($zip) ? '' : $zip . ' ');
    }
}
