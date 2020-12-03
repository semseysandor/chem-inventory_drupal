<?php

namespace Drupal\chem_inv\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a main menu block.
 *
 * @Block(
 *   id = "chem_inv_main_menu",
 *   admin_label = @Translation("Main menu"),
 *   category = @Translation("Custom")
 * )
 */
class MainMenuBlock extends BlockBase
{
    /**
     * {@inheritdoc}
     */
    public function build()
    {

        $build['examples_link'] = [
            '#title' => $this
                ->t('Inventory'),
            '#type' => 'link',
            '#url' => \Drupal\Core\Url::fromRoute('chem_inv.compound'),
        ];

        $build['examples_link'] = [
            '#title' => $this
                ->t('Inventory'),
            '#type' => 'link',
            '#url' => \Drupal\Core\Url::fromRoute('chem_inv.compound'),
        ];

        return $build;
    }

}
