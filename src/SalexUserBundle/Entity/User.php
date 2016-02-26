<?php

namespace SalexUserBundle\Entity;

use Carbon\Carbon;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * User
 *
 * @ORM\Table(name="salex_admin.users")
 * @ORM\Entity(repositoryClass="SalexUserBundle\Repository\UserRepository")
 * @ORM\HasLifecycleCallbacks
 */
class User extends BaseUser
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
     * @var string
     * 
     * @ORM\Column(name="start_date", type="date", nullable=true)
     * 
     */
    protected $startDate;

    /**
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
     * @var string
     *
     * @ORM\Column(name="job_role", type="string", length=255, nullable=true)
     */
    private $jobRole;

    /**
     * @var string
     *
     * @ORM\Column(name="education", type="string", length=255, nullable=true)
     */
    private $education;

    /**
     * @var string
     *
     * @ORM\Column(name="notes", type="text", nullable=true)
     */
    private $notes;

    /**
     * @var array
     *
     * @ORM\Column(name="skills", type="simple_array", nullable=true)
     */
    private $skills;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="text", nullable=true)
     */
    private $address;

    /**
     * @var datetime $createdAt
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var datetime $updatedAt
     * 
     * @ORM\Column(name="updated_at", type="datetime", nullable = true)
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
     * Set Start date
     *
     * @param string $startDate
     *
     * @return User
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return string
     */
    public function getstartDate()
    {
        return $this->startDate;
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
     * @return [type]
     */
    public function getProfilePictureFile()
    {
        return $this->profile_picture_file;
    }

    /**
     * Sets the value of profile_picture_file.
     *
     * @param $profile_picture_file the profile picture file
     *
     * @return self
     */
    public function setProfilePictureFile($profile_picture_file)
    {
        $this->profile_picture_file = $profile_picture_file;

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

    /**
     * Set jobRole
     *
     * @param string $jobRole
     *
     * @return User
     */
    public function setJobRole($jobRole)
    {
        $this->jobRole = $jobRole;

        return $this;
    }

    /**
     * Get jobRole
     *
     * @return string
     */
    public function getJobRole()
    {
        return $this->jobRole;
    }

    /**
     * Set education
     *
     * @param string $education
     *
     * @return User
     */
    public function setEducation($education)
    {
        $this->education = $education;

        return $this;
    }

    /**
     * Get education
     *
     * @return string
     */
    public function getEducation()
    {
        return $this->education;
    }

    /**
     * Set notes
     *
     * @param string $notes
     *
     * @return User
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set skills
     *
     * @param array $skills
     *
     * @return User
     */
    public function setSkills($skills)
    {
        $this->skills = $skills;

        return $this;
    }

    /**
     * Get skills
     *
     * @return array
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return User
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
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

}
