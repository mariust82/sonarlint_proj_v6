<?php
require_once 'application/controllers/AbstractLoggedInController.php';
require_once 'application/models/dao/AcademyCategories.php';

class CategoriesController extends AbstractLoggedInController
{

    public $name = NULL;  // instance variable - test new code - v1


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

    public static function foo() {
        #Bug - Reliability - Intentionality rule - high severity
        if ($this->name != NULL) {
            // ...
        }

        #Code Smell - Maintainability - Intentionality rule
        $resultAnd = true and false; // Noncompliant: $resultAnd == true

        #Consistency rule

    }

    public function bar($param)  {
        #Bug - Reliability - Intentionality rule - high severity
        if ($param === 42) {
            exit(23);
        }
    }
}
