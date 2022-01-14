<?php

final class
MattifestoMedia_Tests_Install_BlogPage {

    /* -- CBTest interfaces -- -- -- -- -- */



    /**
     * @return [object]
     */
    static function
    CBTest_getTests(
    ): array {
        return [
            (object)[
                'name' => 'installPage',
                'type' => 'server',
            ],
        ];
    }
    /* CBTest_getTests() */



    /* -- tests -- -- -- -- -- */



    /**
     * @return object
     */
    static function
    installPage(
    ): stdClass {
        $testPageModelCBID = 'a08441715c733860e9ab77b86cfe16979f7edd67';
        $testPageModelURI = 'blog-a08441715c733860e9ab77b86cfe16979f7edd67';

        CBDB::transaction(
            function () use (
                $testPageModelCBID
            ) {
                CBModels::deleteByID(
                    $testPageModelCBID
                );
            }
        );

        MattifestoMedia_Install_BlogPage::installPage(
            $testPageModelCBID,
            $testPageModelURI
        );

        /* --- */

        $testName = 'saved page URI';

        $pageModel = CBModels::fetchModelByCBID(
            $testPageModelCBID
        );

        $expectedResult = $testPageModelURI;

        $actualResult = CBViewPage::getURI(
            $pageModel
        );

        if (
            $actualResult !== $expectedResult
        ) {
            return CBTest::resultMismatchFailure(
                $testName,
                $actualResult,
                $expectedResult
            );
        }

        /* done */

        CBDB::transaction(
            function () use (
                $testPageModelCBID
            ) {
                CBModels::deleteByID(
                    $testPageModelCBID
                );
            }
        );

        return (object)[
            'succeeded' => true,
        ];
    }
    /* installPage() */

}
