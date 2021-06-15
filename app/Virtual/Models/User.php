<?php

/**
 * @OA\Schema(
 *     description="User model",
 *     title="User model",
 * )
 */
class User
{
    /**
     * @OA\Property(
     *     format="int64",
     *     description="id",
     *     title="id",
     * )
     * 
     * @var number
     */
    public $id;

    /**
     * @OA\Property(
     *     description="firstname",
     *     title="firstname",
     * )
     *
     * @var string
     */
    public $firstname;

    /**
     * @OA\Property(
     *     description="lastname",
     *     title="lastname",
     * )
     *
     * @var string
     */
    public $lastname;

    /**
     * @OA\Property(
     *     format="email",
     *     description="email",
     *     title="email",
     * )
     *
     * @var string
     */
    public $email_address;

    /**
     * @OA\Property(
     *     format="email",
     *     description="email",
     *     title="email",
     * )
     *
     * @var string
     */
    public $member_number;

    /**
     * @OA\Property(
     *     format="date",
     *     description="birthdate",
     *     title="birthdate",
     * )
     *
     * @var string
     */
    public $birthdate;

    /**
     * @OA\Property(
     *     format="date-time",
     *     description="created_at",
     *     title="created_at",
     * )
     *
     * @var string
     */
    public $created_at;

    /**
     * @OA\Property(
     *     format="date-time",
     *     description="updated_at",
     *     title="updated_at",
     * )
     *
     * @var string
     */
    public $updated_at;

    /**
     * @OA\Property(
     *     format="int64",
     *     description="role_id",
     *     title="role_id",
     * )
     *
     * @var number
     */
    public $role_id;
}
