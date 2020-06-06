<?php
class SoftDeleteBehaviour implements DeleteBehaviour {
    public function delete($pk, $connection, $table) {
        var_dump('IN SOFT DELETE STRATEGY');
    }
    
}