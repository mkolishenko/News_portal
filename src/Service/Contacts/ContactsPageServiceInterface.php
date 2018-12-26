<?php

namespace App\Service\Contacts;

use App\Dto\Contacts;

/**
 * Interface of service that provides data for contacts page.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
interface ContactsPageServiceInterface
{
    public function getContacts(): Contacts;
}
