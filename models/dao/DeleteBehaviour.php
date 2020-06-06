<?php
interface DeleteBehaviour {
    public function delete($pk, $connection, $table);
}