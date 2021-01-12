<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pokemon $pokemon
 */
?>
<?php $this->Html->css('./../../webroot/css/viewstyle');?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(__('Delete Pokemon'), ['action' => 'delete', $pokemon->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pokemon->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Pokemons'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pokemons view content">
            <h3><?= h($pokemon->name) ?></h3>
                <div class='view__infos'>
                    <div>
                        <div class=types>
                        <h4 class="first__type <?= $pokemon->first_type ?>"">
                            <?= $pokemon->first_type ?>
                        </h4>
                        <?php if ($pokemon->has_second_type) : ?>
                            <h4 class="second_type <?= $pokemon->second_type ?>">
                                <?= $pokemon->second_type ?>
                            </h4>
                            <?php endif ?>
                        </div>
                        <table class="stats">
                            </tr><th>HP</th><td><?= h($pokemon->pokemon_stats[0]->value)?></td></tr>
                            </tr><th>Defense</th><td><?= h($pokemon->pokemon_stats[1]->value)?></td></tr>
                            </tr><th>Attack</th><td><?= h($pokemon->pokemon_stats[2]->value)?></td></tr>
                            </tr><th>Special Attack</th><td><?= h($pokemon->pokemon_stats[3]->value)?></td></tr>
                            </tr><th>Special Defense</th><td><?= h($pokemon->pokemon_stats[4]->value)?></td></tr>
                            </tr><th>Speed</th><td><?= h($pokemon->pokemon_stats[5]->value)?></td></tr>
                        </table>
                    </div>
                    <img src="<?=$pokemon->main_sprite?>">
                </div>
                <div>
                    <div id="carouselControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="<?=$pokemon->main_sprite?>" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="<?=$pokemon->shiny_sprite?>" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="<?=$pokemon->back_sprite?>" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>