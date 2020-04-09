<?php


namespace App\Domain\Shared\Filters;

use App\Domain\Support\Filters\Filter;

class ContactFilter extends Filter
{

    /**
     * Filter contact by website
     *
     * @param string $website
     * @return \App\Domain\Support\Builder
     */
    public function website($website)
    {
        return $this->query->whereStartsWith('website', $website);
    }


    /**
     * Filter contact by email
     *
     * @param string $address
     * @return \App\Domain\Support\Builder
     */
    public function address($address)
    {
        return $this->query->whereStartsWith('address', $address);
    }

    /**
     * Filter contact by email
     *
     * @param string $email
     * @return \App\Domain\Support\Builder
     */
    public function email($email)
    {
        return $this->query->whereLike('email', $email);
    }

    /**
     * Filter contact by fax
     *
     * @param string $fax
     * @return \App\Domain\Support\Builder
     */
    public function fax($fax)
    {
        return $this->query->whereLike('fax', $fax);
    }

    /**
     * Filter contact by tel
     *
     * @param string $tel
     * @return \App\Domain\Support\Builder
     */
    public function tel($tel)
    {
        return $this->query->whereLike('tel', $tel);
    }

    /**
     * Filter contact by free_dial
     *
     * @param string $free_dial
     * @return \App\Domain\Support\Builder
     */
    public function freeDial($free_dial)
    {
        return $this->query->whereLike('free_dial', $free_dial);
    }

    /**
     * Filter contact by city
     *
     * @param string $city
     * @return \App\Domain\Support\Builder
     */
    public function city($city)
    {
        return $this->query->whereLike('city', $city);
    }

    /**
     * Filter contact by postcode
     *
     * @param string $postcode
     * @return \App\Domain\Support\Builder
     */
    public function postcode($postcode)
    {
        return $this->query->whereLike('postcode', $postcode);
    }
}