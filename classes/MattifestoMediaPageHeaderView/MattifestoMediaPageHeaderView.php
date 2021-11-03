<?php

final class
MattifestoMediaPageHeaderView {

    /* -- CBView interfaces -- */



    /**
     * @param object $model
     *
     * @return void
     */
    static function
    CBView_render(
        stdClass $model
    ): void {
        $selectedMainMenuItemName = CBModel::valueToString(
            CBHTMLOutput::pageInformation(),
            'selectedMainMenuItemName'
        );

        ?>

        <header class="MattifestoMediaPageHeaderView CBDarkTheme">
            <?php

            CBView::renderSpec(
                (object)[
                    'className' => 'CB_CBView_MainHeader',
                ]
            );

            CBView::render(
                (object)[
                    'className' => 'CBMenuView',
                    'menuID' => MattifestoMediaMenu_main::ID(),
                    'selectedItemName' => $selectedMainMenuItemName,
                ]
            );

            ?>
        </header>

        <?php
    }
    /* CBView_render() */

}
