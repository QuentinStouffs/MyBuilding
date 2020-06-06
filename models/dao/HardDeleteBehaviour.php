<?php
class HardDeleteBehaviour implements DeleteBehaviour {
    public function delete($pk, $connection, $table) {
        try {
            $statement = $connection->prepare("DELETE FROM {$table} WHERE pk = ?");
            $statement->execute([$pk]);
            $result = $statement->rowCount();

            return $result > 0;

        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }
}