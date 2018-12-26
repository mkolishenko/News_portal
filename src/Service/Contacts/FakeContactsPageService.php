<?php

namespace App\Service\Contacts;

use App\Dto\Contacts;
use Faker\Factory;

/**
 * Fake contacts page service that generates fake data.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
final class FakeContactsPageService implements ContactsPageServiceInterface
{
    /**
     * {@inheritdoc}
     */
    public function getContacts(): Contacts
    {
        $faker = Factory::create();

        return new Contacts(
            $faker->address,
            $faker->tollFreePhoneNumber,
            $faker->email
        );
    }
}
