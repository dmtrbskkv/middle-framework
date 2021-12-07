<?php

namespace App\Models;

use Morce\Database\Model;

/**
 * @Entity
 * @Table(name="users")
 */
class User extends Model
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private int $id;

    /** @Column(length=140) */
    private string $login;

    /** @Column(length=140) */
    private string $password;
}