<?php

final class
MattifestoMediaPage_blog {

    /**
     * @return void
     */
    static function CBInstall_configure(): void {
        MattifestoMediaPage_blog::installPage();
        MattifestoMediaPage_blog::installMenuItem();
    }



    /**
     * @return ID
     */
    static function ID(): string {
        return 'a228cc77e377fb1e4c507ed635995346d13c2476';
    }



    /**
     * @return void
     */
    private static function installMenuItem(): void {
        $updater = CBModelUpdater::fetch(
            (object)[
                'ID' => MattifestoMediaMenu_main::ID(),
            ]
        );

        $menuSpec = $updater->working;

        CBMenu::addOrReplaceItem(
            $menuSpec,
            (object)[
                'className' => 'CBMenuItem',
                'name' => 'blog',
                'text' => 'Blog',
                'URL' => '/blog/',
            ]
        );

        CBModelUpdater::save($updater);
    }
    /* installMenuItem() */



    /**
     * @return void
     */
    private static function
    installPage(
    ): void {
        $updater = new CBModelUpdater(
            MattifestoMediaPage_blog::ID()
        );

        $blogPageSpec = $updater->getSpec();

        CBModel::merge(
            $blogPageSpec,
            CBViewPage::standardPageTemplate()
        );

        CBModel::merge(
            $blogPageSpec,
            (object)[
                'classNameForKind' => 'MattifestoMediaGeneratedPageKind',
                'isPublished' => true,
                'selectedMenuItemNames' => 'blog',
                'title' => 'Blog',
                'URI' => 'blog',
            ]
        );


        /* publicationTimeStamp */

        $currentPublicationTimeStamp = CBModel::valueAsInt(
            $blogPageSpec,
            'publicationTimeStamp'
        );

        if (
            $currentPublicationTimeStamp === null
        ) {
            $blogPageSpec->publicationTimeStamp = time();
        }


        /* page title and description view */

        $sourceID = '0dc7571cd8fcf75a37656435eb49c67598185890';

        CBSubviewUpdater::unshift(
            $blogPageSpec,
            'sourceID',
            $sourceID,
            (object)[
                'className' => 'CBPageTitleAndDescriptionView',
                'sourceID' => $sourceID,
            ]
        );


        /* page list view */

        $sourceID = 'eac5195e77c06a3c2be4b0c52715add129f5d17e';

        CBSubviewUpdater::push(
            $blogPageSpec,
            'sourceID',
            $sourceID,
            (object)[
                'className' => 'CBPageListView2',
                'classNameForKind' => 'MattifestoMediaBlogPostPageKind',
                'sourceID' => $sourceID,
            ]
        );


        /* save */

        $updater->save2();
    }
    /* installPage() */

}
