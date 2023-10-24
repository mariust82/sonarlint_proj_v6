<?php
require_once 'application/controllers/AbstractLoggedInController.php';
require_once 'application/models/dao/AcademyCategories.php';

class CategoriesController extends AbstractLoggedInController
{

    protected function service()
    {
        $categories = new AcademyCategories();
        $this->response->attributes("categories", $categories->getAll());
        $this->response->attributes("totalGuides", $categories->getCategoryTotalGuides());
    }

    protected function setFields() : void
    {
        $fields = $this->query->fields();
        $fields
            ->add("DISTINCT games.id")
            ->add("games.name","game_name")
            ->add("games.score")
            ->add("game_manufacturers.name")
            ->add("COALESCE(gpl.played_times, 0)", "times_played");
        if ($this->filter->getDateLaunched()) {
            $fields->add("games.date_launched");
        }
        //games without free play
        if ($this->filter->getGamesWithoutFreePlay()) {
            $fields->add("IF(gpp.isMobile IN (".($this->filter->getViewport() ? 1 : 0).", '2'), 0, 1)", "no_free_play");
        } else if ($fields===false){
            echo "test";
        }
    }

    protected function constantsTest()
    {
        define( 'CONSTANT_VALUE', 'old value' );
        define( 'SCRIPT_DEBUG', 1 );

        // Noncompliant, tries to redefine constant defined 2 lines above
        define( 'CONSTANT_VALUE', 'intended value' );
        echo CONSTANT_VALUE; // output: 'old value'

        //added on dev branch for pull req
        define( 'SCRIPT_DEBUG', 1 );
        define( 'SCRIPT_DEBUG', 2 );
        define( 'SCRIPT_DEBUG', 3 ); define( 'SCRIPT_DEBUG', 3 );

        $this->test_var_1 = "ceva";
        $this->test_var_2 = "ceva_v2";

        //second PR
        define( 'SCRIPT_DEBUG', 4 ); define( 'SCRIPT_DEBUG', 4 );
        if($this->test_var_1=='test'){

        }else if($this->test_var_2=='altceva'){
            echo "PR TEST";
        }

    }
}
