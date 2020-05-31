<?php
class HardDeleteBehaviour implements DeleteBehaviour {
    public function delete($pk) {
        var_dump('IN HARD DELETE STRATEGY');
    }
}