<?php

final class
MattifestoMediaMenu_main {

    /* -- CBInstall interfaces -- */



    /**
     * @return void
     */
    static function
    CBInstall_install(
    ): void {
        $menuModelCBID = MattifestoMediaMenu_main::ID();

        $updater = CBModelUpdater::fetch(
            (object)[
                'className' => 'CBMenu',
                'ID' => $menuModelCBID,
                'title' => 'Website',
                'titleURI' => '/',
            ]
        );

        CBModelUpdater::save(
            $updater
        );

        CB_StandardPageFrame::setDefaultMainMenuModelCBID(
            $menuModelCBID
        );
    }
    /* CBInstall_install() */



    /**
     * @return [string]
     */
    static function
    CBInstall_requiredClassNames(
    ): array {
        return [
            'CB_StandardPageFrame',
            'CBMenu',
            'CBModelUpdater',
        ];
    }
    /* CBInstall_requiredClassNames() */



    /* -- functions -- */



    /**
     * @return ID
     */
    static function
    ID(
    ): string {
        return 'aaba3db523731306b216c46d9eab9770c0030bc6';
    }
    /* ID() */

}
