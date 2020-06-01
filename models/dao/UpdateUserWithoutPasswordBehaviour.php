<?php


class UpdateUserWithoutPasswordBehaviour extends DAO implements UpdateUserBehaviour
{
    public function update($data)
    {
        $values = [$data['name'], $data['email'], $data['appartment_number'], $data['pk']];
        $qry = "UPDATE users SET name = ?, email = ?, appartment_number = ? WHERE pk = ?";
        try {
            $statement = $this->connection->prepare($qry);
            $statement->execute($values);
            return true;
        } catch(PDOException $e) {
            if($e->getCode() == "23000") {
                return "Cet enregistrement existe déja";
            } else {
                print $e->getMessage();
            }
        }
    }
}