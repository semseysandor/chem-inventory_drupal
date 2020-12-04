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
        $build['all compounds'] = [
            '#title' => $this
                ->t('Compounds'),
            '#type' => 'link',
            '#url' => \Drupal\Core\Url::fromRoute('chem_inv.compounds'),
        ];
        $build['compound'] = [
            '#title' => $this
                ->t('Add compound'),
            '#type' => 'link',
            '#url' => \Drupal\Core\Url::fromRoute('chem_inv.compound'),
        ];

        return $build;
    }
}
