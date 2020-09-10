<?php

namespace App;

use Doctrine\ORM\Mapping as ORM;
use Illuminate\Contracts\Auth\Authenticatable;
use Indaxia\OTR\ITransformable;
use Indaxia\OTR\Traits\Transformable;
use Tymon\JWTAuth\Contracts\JWTSubject;

use App\Notifications\VerifyEmail;
use DateTime;
use LaravelDoctrine\ORM\Notifications\Notifiable;

/**
 * User
 *
 * @ORM\Table(name="users")
 * @ORM\Entity
 */
class User implements
    ITransformable,
    JWTSubject,
    Authenticatable
{

    use Transformable;

    use Notifiable;
    /**
     * @var string
     *
     * @ORM\Column(name="id", type="guid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string")
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="cpf", type="string")
     */
    private $cpf;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string")
     */
    private $password;

    /**
     * @var string|null
     *
     * @ORM\Column(name="phone_number", type="string", nullable=true)
     */
    private $phoneNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="remember_token", type="string", nullable=true)
     */
    private $rememberToken;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="email_verified_at", type="datetime", nullable=true)
     */
    private $emailVerifiedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;


    /**
     * Get id.
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set email.
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set cpf.
     *
     * @param string $cpf
     *
     * @return User
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get cpf.
     *
     * @return string
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set password.
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set phoneNumber.
     *
     * @param string|null $phoneNumber
     *
     * @return User
     */
    public function setPhoneNumber($phoneNumber = null)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber.
     *
     * @return string|null
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set rememberToken.
     *
     * @param string|null $rememberToken
     *
     * @return User
     */
    public function setRememberToken($rememberToken = null)
    {
        $this->rememberToken = $rememberToken;

        return $this;
    }

    /**
     * Get rememberToken.
     *
     * @return string|null
     */
    public function getRememberToken()
    {
        return $this->rememberToken;
    }

    /**
     * Set emailVerifiedAt.
     *
     * @param \DateTime|null $emailVerifiedAt
     *
     * @return User
     */
    public function setEmailVerifiedAt($emailVerifiedAt = null)
    {
        $this->emailVerifiedAt = $emailVerifiedAt;

        return $this;
    }

    /**
     * Get emailVerifiedAt.
     *
     * @return \DateTime|null
     */
    public function getEmailVerifiedAt()
    {
        return $this->emailVerifiedAt;
    }

    /**
     * Set createdAt.
     *
     * @param \DateTime $createdAt
     *
     * @return User
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt.
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt.
     *
     * @param \DateTime $updatedAt
     *
     * @return User
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt.
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Get updatedAt.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * Get JWT identifier.
     *
     * @return string|null
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get Key
     *
     * @return string|null
     */
    public function getKey()
    {
        return $this->id;
    }

    /**
     * Get Auth identifier.
     *
     * @return string|null
     */
    public function getAuthIdentifier()
    {
        return $this->getId();
    }

    /**
     * Get name of the unique identifier of user field
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    /**
     * Get password of user
     *
     * @return string|null
     */
    public function getAuthPassword()
    {
        $this->getPassword();
    }

    /**
     * Get name of field for remember token name
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    /**
     * Send notification - veifications e-mail
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail);
    }

    /**
     * Check if user has a verified mail
     *
     * @return boolean
     */
    public function hasVerifiedEmail()
    {
        return !is_null($this->emailVerifiedAt);
    }
}
