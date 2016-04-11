<?php

namespace SalexUserBundle\Entity;

use Avanzu\AdminThemeBundle\Model\UserInterface as ThemeUser;
use Carbon\Carbon;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * User
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="SalexUserBundle\Repository\UserRepository")
 * @ORM\HasLifecycleCallbacks
 * @Vich\Uploadable
 */
class User extends BaseUser implements ThemeUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=255, nullable=true)
     */
    protected $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255, nullable=true)
     */
    protected $lastName;

    /**
     * @Assert\Image(
     *     maxSize="3M",
     *     mimeTypes={"image/png", "image/jpeg", "image/pjpeg"},
     *     maxWidth=250,
     *     maxHeight=250
     * )
     * @Vich\UploadableField(mapping="profile_image", fileNameProperty="profile_picture")
     * @var [type]
     */
    private $profile_picture_file;

    /**
     * @ORM\Column(name="profile_picture", type="string", nullable=true)
     * @var string
     */
    private $profilePicture;


    /**
     * @var datetime $createdAt
     *
     * @ORM\Column(name="created_at", type="datetime")
     * @Assert\Type("\DateTime")
     * 
     */
    private $createdAt;

    /**
     * @var datetime $updatedAt
     * 
     * @ORM\Column(name="updated_at", type="datetime", nullable = true)
     * @Assert\Type("\DateTime")
     * 
     */
    private $updateAt;
    
    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
    
    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Get full name of the user
     * 
     * @return string
     */
    public function getName()
    {
        return $this->getFirstName() . ' ' . $this->getLastName();
    }

    /**
     * Sets the value of id.
     *
     * @param int $id the id
     *
     * @return self
     */
    protected function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of profile_picture_file.
     *
     * @return string
     */
    public function getProfilePictureFile()
    {
        return $this->profile_picture_file;
    }

    /**
     * Sets the value of profile_picture_file.
     *
     * @param File $profile_picture_file
     *
     * @return self
     */
    public function setProfilePictureFile(File $profile_picture_file)
    {
        $this->profile_picture_file = $profile_picture_file;

        // Only change the updated af if the file is really uploaded to avoid database updates.
        // This is needed when the file should be set when loading the entity.
        if ($this->profile_picture_file instanceof UploadedFile) {
            $this->setUpdateAt(new Carbon());
        }

        return $this;
    }

    /**
     * Gets the value of profilePicture.
     *
     * @return string
     */
    public function getProfilePicture()
    {
        return $this->profilePicture;
    }

    /**
     * Sets the value of profilePicture.
     *
     * @param string $profilePicture the profile picture
     *
     * @return self
     */
    public function setProfilePicture($profilePicture)
    {
        $this->profilePicture = $profilePicture;

        return $this;
    }

    public function getLastLogin( $human_readable = false)
    {
        $last_login = parent::getLastLogin();
        $carbon = Carbon::instance($last_login);

        if ( $human_readable ) {
            return $carbon->diffForHumans();
        }

        return $carbon->toDateTimeString();
    }

    /**
     * Gets triggered only on insert

     * @ORM\PrePersist
     */
    public function onPrePersist()
    {
        $this->createdAt = new Carbon();
    }

    /**
     * Gets triggered every time on update

     * @ORM\PreUpdate
     */
    public function onPreUpdate()
    {
        $this->updateAt = new Carbon();
    }


    /**
     * Set createdAt
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
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updateAt
     *
     * @param \DateTime $updateAt
     *
     * @return User
     */
    public function setUpdateAt($updateAt)
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    /**
     * Get updateAt
     *
     * @return \DateTime
     */
    public function getUpdateAt()
    {
        return $this->updateAt;
    }

    /* Following functions are implemented for ThemeUser Interface  */

    public function getAvatar()
    {
        return $this->getProfilePicture();
    }

    public function getMemberSince()
    {
        return $this->createdAt;
    }

    public function isOnline()
    {
        return true;
    }

    public function getIdentifier()
    {
        return '';
    }

    public function getTitle()
    {
        return '';
    }
}
