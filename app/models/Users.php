<?php

namespace phpMS\Models;

use Phalcon\Mvc\Model;
use Phalcon\Validation;
use Phalcon\Validation\Validator\Uniqueness;

class Users extends Model
{
    const STATUS_INACTIVE = 0;

    const STATUS_ACTIVE = 1;

    const STATUS_SUSPENDED = 2;

    const STATUS_BANNED = 3;

    /**
     * @var int
     */
    protected $uID;

    /**
     * @var string
     */
    protected $uName;

    /**
     * @var string
     */
    protected $uEmail;

    /**
     * @var string
     */
    protected $uPass;


    /**
     * @var int
     */
    protected $group_id;


    /**
     * Method to set the value of field id.
     *
     * @param nchar $uID
     *
     * @return $this
     */
    public function setuID($uID)
    {
        $this->uID = nchar(10) $uID;

        return $this;
    }

    /**
     * Method to set the value of field name.
     *
     * @param string $uName
     *
     * @return $this
     */
    public function setuName($uName)
    {
        $this->uName = $uName;

        return $this;
    }

    /**
     * Method to set the value of field email.
     *
     * @param string $email
     *
     * @return $this
     */
    public function setuEmail($uEmail)
    {
        $this->uEmail = $uEmail;

        return $this;
    }

    /**
     * Method to set the value of field password.
     *
     * @param string $password
     *
     * @return $this
     */
    public function setuPass($uPass)
    {
        $this->uPass= $uPass;

        return $this;
    }

    /**
     * Method to set the value of field group_id.
     *
     * @param int $group_id
     *
     * @return $this
     */
    public function setugID($ugID)
    {
        $this->ugID = $ugID;

        return $this;
    }

     /**
     * Returns the value of field id.
     *
     * @return int
     */
    public function getuID()
    {
        return $this->uID;
    }

    /**
     * Returns the value of field name.
     *
     * @return string
     */
    public function getuName()
    {
        return $this->uName;
    }

    /**
     * Returns the value of field email.
     *
     * @return string
     */
    public function getuEmail()
    {
        return $this->uEmail;
    }

    /**
     * Returns the value of field password.
     *
     * @return string
     */
    public function getuPass()
    {
        return $this->uPass;
    }

    /**
     * Validate that emails are unique across users
     */
    public function validation()
    {
        $validator = new Validation();
        $validator->add('uEmail', new Uniqueness([
            "message" => "The email is already registered"
        ]));
        return $this->validate($validator);
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('ugID', 'phpMS\Models\uGroup', 'gID', array(
            'alias' => 'uGroup',
            'reusable' => true,
        ));
    }

    public function getSource()
    {
        return 'users';
    }

    /**
     * @return User[]
     */
    public static function find($parameters = array())
    {
        return parent::find($parameters);
    }

    /**
     * @return User
     */
    public static function findFirst($parameters = array())
    {
        return parent::findFirst($parameters);
    }

    /**
     * Before create the users assign a password.
     */
    public function beforeValidationOnCreate()
    {
        if (empty($this->uPass)) {
            $tempPassword = preg_replace('/[^a-zA-Z0-9]/', '', base64_encode(openssl_random_pseudo_bytes(12)));
            $this->uPass = $this->getDI()->getSecurity()->hash($tempPassword);
        }
     }

    /**
     * Send a confirmation e-mail to the users if the account is not active.
     */
    public function afterCreate()
    {
      //do something
    }
}