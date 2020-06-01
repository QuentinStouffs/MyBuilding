<?php


class UpdateUserWithPasswordBehaviour extends UserDAO implements UpdateUserBehaviour
{
    function update($data)
    {
        $object = $this->create($data);
        return $this->updateWithObject($object);
    }
}