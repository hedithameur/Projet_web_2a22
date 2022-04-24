<?php
    include_once '../../config.php';
    class vote{
    
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo=$pdo;
    }

    private function recordExists($ref,$ref_id)
    {
        $req = $this->pdo->prepare("SELECT * FROM $ref WHERE id = ?"); 
        $req->execute(array($ref_id));
        if($res->rowCount()==0 )
        {throw new Exceprtion('impossible de voter pour un enregistrement qui n\'existe pas');}
    }

    public function like($ref,$ref_id,$user_id)
    {
        return $this->vote($ref,$ref_id,$user_id, 1);
    }

    public function dislike($ref,$ref_id,$user_id)
    {
        return $this->vote($ref,$ref_id,$user_id, -1);
    }    

    public static function getclass($vote)//ajout fonction is_like ou is_dislike
    {
        if($vote)
        {
            return $vote->vote == 1 ? 'is_like' : 'is_dislike';

        }
         return null;
    }

    private function vote($ref,$ref_id,$user_id,$vote)
    {
        $this->recordExists($ref,$ref_id);

        $req = $this->pdo->prepare("SELECT id,vote WHERE ref=? AND ref_id=? AND user_id=? ");
        $req->execute([$ref,$ref_id,$user_id]);
        $vote_row=$req->fetch();
        if($vote_row)
        {
            if($vote_row->vote == $vote)
            {
                return true;

            }
            $this->pdo->prepare("UPDATE vote SET vote = ?, created_at = ? 
            WHERE id={$vote_row->id}")->execute([$vote, date('Y-m-d H:i:s') ]);
            return true;
        }

        $req = $this->pdo->prepare("INSERT INTO vote SET ref=?, ref_id=?, user_id=?, creaated_at=?,vote=$vote");
        $req->execute([$ref,$ref_id,$user_id, date('Y-m-d H:i:s')]);
        return true;    
    }
    public function updateCount($ref,$ref_id)
    {
        $req = $this->pdo->prepare("SELECT COUNT(id) as count ,vote FROM vote WHERE ref = ? AND ref_id = ? GROUP BY vote ");
        $req->execute([$ref, $ref_id]);
        $vote = $req->fetchAll();
        $count=
        [
            '-1' => 0,
            '1' => 0
        ];
        foreach($vote as $vote);
    {
        $counts[$vote->vote]= $vote->count;
    }
        $req = $this->pdo->query("UPDATE $ref SET like_count = {$counts[1]} WHERE id = $ref_id");
        return true;

    }



    }
?>