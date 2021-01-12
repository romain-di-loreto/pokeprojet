<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pokemon $Pokemons
 */
?>
<?php 
    use Cake\ORM\TableRegistry;
    
    $query = TableRegistry::getTableLocator()->get('pokemons')
    ->find();
    $query->select(['avg' => $query->func()->avg('weight')])
        ->where([function($exp){return $exp->between('pokedex_number',387,493);}]);

    $avgweight = 0;
    foreach($query->all() as $result){
        $avgweight = $result->avg;
    }
    if($avgweight == null) $avgweight = 0;    

    $query = TableRegistry::getTableLocator()->get('types')
    ->find()
    ->select(['id'])
    ->where(["name" => "fairy"]);
    $id = 0;
    foreach($query as $result){
        $id = $result->id;
    }

    $query = TableRegistry::getTableLocator()->get('pokemons')
    ->find()
    ->select(['id'])
    ->where(['OR' => [function($exp){return $exp->between('pokedex_number',1,151);},function($exp){return $exp->between('pokedex_number',252,386);},function($exp){return $exp->between('pokedex_number',722,809);}]]);

    $group = array();
    foreach($query as $result){
        array_push($group,$result->id);
    }

    $query = TableRegistry::getTableLocator()->get('pokemon_types')
    ->find()
    ->select(['count' => $query->func()->count('id')])
    ->where(["type_id" => $id , "pokemon_id IN" => $group]);

    $fairycount = 0;
    foreach($query->all() as $result){
        $fairycount = $result->count;
    }

    $query = TableRegistry::getTableLocator()->get('pokemons')
    ->find('all')->contain(['PokemonStats.Stats']);    

?>
<div class="stats content">
    <div id="tableau_statistique">
        <table class="count_of">
            <tr><th>Poids moyen des pokemons de la 4éme génération</th><td><?=$avgweight?></td></tr>
            <tr><th>Nombre de pokemons de type fée entre les générations 1, 3 et 7</th><td><?=$fairycount?></td></tr>
        </table>
        
    </div>
</div>