<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Nearby
 *
 * @ORM\Table(name="nearby")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\NearbyRepository")
 */
class Nearby
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="city_code", type="string", length=255)
     */
    private $cityCode;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="city_ascii", type="string", length=255)
     */
    private $cityAscii;

    /**
     * @var string
     *
     * @ORM\Column(name="lat", type="text")
     */
    private $lat;

    /**
     * @var string
     *
     * @ORM\Column(name="lang", type="text")
     */
    private $lang;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="iso2", type="string", length=10)
     */
    private $iso2;

    /**
     * @var string
     *
     * @ORM\Column(name="iso3", type="string", length=10)
     */
    private $iso3;

    /**
     * @var string
     *
     * @ORM\Column(name="admin_name", type="string", length=25)
     */
    private $adminName;

    /**
     * @var int
     *
     * @ORM\Column(name="population", type="integer")
     */
    private $population;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_date", type="datetime")
     */
    private $createDate;


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
     * Set cityCode
     *
     * @param string $cityCode
     *
     * @return Nearby
     */
    public function setCityCode($cityCode)
    {
        $this->cityCode = $cityCode;

        return $this;
    }

    /**
     * Get cityCode
     *
     * @return string
     */
    public function getCityCode()
    {
        return $this->cityCode;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Nearby
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set cityAscii
     *
     * @param string $cityAscii
     *
     * @return Nearby
     */
    public function setCityAscii($cityAscii)
    {
        $this->cityAscii = $cityAscii;

        return $this;
    }

    /**
     * Get cityAscii
     *
     * @return string
     */
    public function getCityAscii()
    {
        return $this->cityAscii;
    }

    /**
     * Set lat
     *
     * @param string $lat
     *
     * @return Nearby
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * Get lat
     *
     * @return string
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set lang
     *
     * @param string $lang
     *
     * @return Nearby
     */
    public function setLang($lang)
    {
        $this->lang = $lang;

        return $this;
    }

    /**
     * Get lang
     *
     * @return string
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return Nearby
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set iso2
     *
     * @param string $iso2
     *
     * @return Nearby
     */
    public function setIso2($iso2)
    {
        $this->iso2 = $iso2;

        return $this;
    }

    /**
     * Get iso2
     *
     * @return string
     */
    public function getIso2()
    {
        return $this->iso2;
    }

    /**
     * Set iso3
     *
     * @param string $iso3
     *
     * @return Nearby
     */
    public function setIso3($iso3)
    {
        $this->iso3 = $iso3;

        return $this;
    }

    /**
     * Get iso3
     *
     * @return string
     */
    public function getIso3()
    {
        return $this->iso3;
    }

    /**
     * Set adminName
     *
     * @param string $adminName
     *
     * @return Nearby
     */
    public function setAdminName($adminName)
    {
        $this->adminName = $adminName;

        return $this;
    }

    /**
     * Get adminName
     *
     * @return string
     */
    public function getAdminName()
    {
        return $this->adminName;
    }

    /**
     * Set population
     *
     * @param integer $population
     *
     * @return Nearby
     */
    public function setPopulation($population)
    {
        $this->population = $population;

        return $this;
    }

    /**
     * Get population
     *
     * @return int
     */
    public function getPopulation()
    {
        return $this->population;
    }

    /**
     * Set createDate
     *
     * @param \DateTime $createDate
     *
     * @return Nearby
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;

        return $this;
    }

    /**
     * Get createDate
     *
     * @return \DateTime
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }
}

