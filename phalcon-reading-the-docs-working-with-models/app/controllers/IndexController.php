<?php

class IndexController extends ControllerBase
{


    /**
     * [indexAction description]
     * @return [type] [description]
     */
    public function indexAction()
    {

        /**
         * http://docs.phalconphp.com/en/latest/reference/views.html
         */

        $this->view->setVar("familia", array(
            "Pai"      => "José Valério",
            "Mãe"      => "Maria Aldina",
            "Irmã"     => "Sílvia Valério",
            "Cunhado"  => "Miguel Serrão",
            "Sobrinha" => "Matilde Valério"
        ));

        /**
         * or Using the magic setter
         * $this->view->familia = array( ... );
         */

        $this->view->setVars(array(
            "eu"      => "Ricardo Valério",
            "cidades" => array(
                "Lisboa", "Coimbra", "Porto", "Faro"
            )
        ));
    }

    /**
     * [findAction description]
     * @return [type] [description]
     */
    public function findAction()
    {
        $this->view->setTemplateAfter('all');

        /**
         * ver todos as query options que podem ser passadas como argumentos :
         * http://docs.phalconphp.com/en/latest/reference/models.html#finding-records
         */

        // o primeiro da tabela
        $u1 = Utentes::findFirst();
        echo "<h4 style='color:green;'>findFirst()</h4>";
        echo $u1->primeiro_nome . " " . $u1->ultimo_nome . " - " . $u1->email . "<br>";

        /*****************************************************************/

        // o primeiro by[nome do campo da tabela] e com o valor passado
        $u2 = Utentes::findFirstByEmail("joaofaria@gmail.com");
        echo "<h4 style='color:green;'>findFirstBy<span style='color:orange;'>Email</span>()</h4>";
        echo $u2->primeiro_nome . " " . $u2->ultimo_nome . " - " . $u2->email . "<br>";

        /*****************************************************************/

        // todos
        $u3 = Utentes::find();
        echo "<h4 style='color:green;'>find()</h4>";
        echo "there are " . count($u3) . " registers <br>";
        foreach ($u3 as $utente) {
            echo $utente->primeiro_nome . " " . $utente->ultimo_nome . " - " . $utente->email . "<br>";
        }

        /*****************************************************************/

        // How many utentes with lastname Guilherme are there?
        $u4 = Utentes::find("ultimo_nome = 'Guilherme'");
        echo "<h4 style='color:green;'>find(\"ultimo_nome = 'Guilherme'\")</h4>";
        echo "There are ", count($u4), " with last name Guilherme <br>";

        /*****************************************************************/

        // Get and print virtual Utentes ordered by name
        $u5 = Utentes::find(array(
            "ultimo_nome = 'Guilherme'",
            "order" => "email"
        ));
        foreach ($u5 as $utente) {
            echo $utente->primeiro_nome, " ", $utente->ultimo_nome, " - ", $utente->email, "<br>";
        }

        /*****************************************************************/

        // limit 10 registers
        //  NOTA: find("limit = 10") não funcionou PORQUE o primeiro parametro tem
        //  de ser uma condição WHERE
        $u6 = Utentes::find(array(
            "limit" => 10
        ));
        echo "<h4 style='color:green;'>find(array(\"limit\" => 10 ))</h4>";
        foreach ($u6 as $utente) {
            echo $utente->primeiro_nome, " ", $utente->ultimo_nome, " - ", $utente->email, "<br>";
        }


        /*****************************************************************/
        // Forma mais segura para evitar SQL injection

        // Query Utentes binding parameters with string placeholders
        $conditions = "especialidades_id = :especialidades_id: AND horarios_id = :horarios_id:";

        //Parameters whose keys are the same as placeholders
        $parameters = array(
            "especialidades_id" => "5",
            "horarios_id" => "2"
        );

        //Perform the query
        $m1 = Medicos::find(array(
            $conditions,
            "bind" => $parameters
        ));

        echo "<h4 style='color:green;'>find(array(
            [conditions],
            \"bind\" => [parameters]
        )) - string placeholder</h4>";
        foreach ($m1 as $medico) {
            echo $medico->primeiro_nome, " ", $medico->ultimo_nome, " - ", $medico->email, "<br>";
        }

        /*****************************************************************/
        // Query Utentes binding parameters with string placeholders
        $conditions = "especialidades_id = ?1 AND horarios_id = ?2";

        //Parameters whose keys are the same as placeholders
        $parameters = array(
            1 => "5",
            2 => "2"
        );

        //Perform the query
        $m2 = Medicos::find(array(
            $conditions,
            "bind" => $parameters
        ));

        echo "<h4 style='color:green;'>find(array(
            [conditions],
            \"bind\" => [parameters]
        ))  - numeric placeholder</h4>";
        foreach ($m2 as $medico) {
            echo $medico->primeiro_nome, " ", $medico->ultimo_nome, " - ", $medico->email, "<br>";
        }

        /*****************************************************************/

        //Bind parameters
        $parameters = array(
            "email" => "carlos@ribeiro.com",
            "contacto_tel" => 917866545
        );

        //Casting Types
        $types = array(
            "email" => \Phalcon\Db\Column::BIND_PARAM_STR,
            "contacto_tel" => \Phalcon\Db\Column::BIND_PARAM_INT
        );

        // Query robots binding parameters with string placeholders
        $m3 = Medicos::find(array(
            "email = :email: AND contacto_tel = :contacto_tel:",
            "bind" => $parameters,
            "bindTypes" => $types
        ));

        echo "<h4 style='color:green;'>find() -  com bindtypes</h4>";
        foreach ($m3 as $medico) {
            echo $medico->primeiro_nome, " ", $medico->ultimo_nome, " - ", $medico->email, "<br>";
        }

        /*****************************************************************/
        $m4 = Medicos::find();
        echo "<h4 style='color:green;'>find() - a ir a mais do que uma tabela com relações diferentes</h4>";
        foreach ($m4 as $medico)
        {
            echo $medico->id . " - " .
            $medico->primeiro_nome . " - " .
            $medico->especialidades->especialidade . " - " .
            $medico->horarios->descricao_horario . "<br>";

            $cons_por_medicos = ConsultasMarcadas::find(array(
                "conditions" => "medicos_id = :medico_id:",
                "bind"       => array(
                                    "medico_id" => $medico->id
                                )
            ));

            foreach ($cons_por_medicos as $cm)
            {
                echo $cm->data_consulta ."<br>";
            }

            echo "<hr>";
        }

        /*****************************************************************/

        $m5 = ConsultasMarcadas::find();
        echo "<h4 style='color:green;'>find() - outra vez a ir a mais do que uma tabela</h4>";

        foreach ($m5 as $cm) {
            echo $cm->hora_consulta . " " .
                $cm->medicos->primeiro_nome . " " .
                $cm->utentes->email ."<br>";
        }

        /*****************************************************************/

        /**
         * http://docs.phalconphp.com/en/latest/reference/models.html#generating-calculations
         */

        echo "<h4 style='color:green;'>Count - Sum - Ave - Max - Min</h4>";

        $num_especialidades = Especialidades::count();
        echo "Nº de especialidades: $num_especialidades <br>";

        $num_medicos_tarde = Medicos::count("horarios_id = 2");
        echo "Nºde médicos de tarde: $num_medicos_tarde <br>";

        $sum_salario_medicos = Medicos::sum(array(
            "column" => "salario_mensal"
        ));
        echo "Sum salários: $sum_salario_medicos <br>";

        $av_salario_medicos = Medicos::average(array(
            "column" => "salario_mensal"
        ));
        echo "Average salários: $av_salario_medicos <br>";

        $max_salario_medicos = Medicos::maximum(array(
            "column" => "salario_mensal"
        ));
        echo "Max salário: $max_salario_medicos <br>";

        $min_salario_medicos = Medicos::minimum(array(
            "column" => "salario_mensal"
        ));
        echo "Min salário: $min_salario_medicos <br>";


        /*****************************************************************/

    }

    /**
     * [saveAction description]
     * @return [type] [description]
     */
    public function saveAction($id = 20)
    {
        /**
         * http://docs.phalconphp.com/en/latest/reference/models.html#creating-updating-records
         */

        $acordo                   = new Acordos();
        $acordo->id               = $id;
        $acordo->datetime_acordo  = "2012-10-21";
        $acordo->instituicao      = "nosave";
        $acordo->foto_instituicao = "nosave.png";

        /**
         * Or this way:
         *
         *           $acordo = new Acordos();
         *
         *           $acordo->save(array(
         *               "id" => "20",
         *               "datetime_acordo" => "2012-10-21",
         *               "instituicao" => "Montepia",
         *               "foto_instituicao" => "montepio.png"
         *           ));
         *
         *  Or yet:
         *
         *      $robot->save($_POST, array('model_field', 'another_model_field'));
         *
         */

        if( $acordo->save() ){
            echo "acordo saved (create or updated) successfully";
            // depois de inserido é possivel aceder ao id que foi criado pela BD
            echo "| id of the acordo inserted: $acordo->id";
        }
        else{
            echo "not saved";
            foreach ($acordo->getMessages() as $message) {
                echo "Message: ", $message->getMessage() . "<br>";
                echo "Field: ", $message->getField() . "<br>";
                echo "Type: ", $message->getType() . "<br>";
            }
        }
    }

    /**
     * [formSaveAction description]
     * @return [type] [description]
     */
    public function formSaveAction()
    {
        $acordo = new Acordos();
        if ( $acordo->save($_POST, array('instituicao', 'foto_instituicao', 'datetime_acordo')) ){
            echo "save with success";
        }else{
            echo "not save successfully ";
            foreach ($acordo->getMessages() as $message) {
                echo $message, "\n";
            }
        }
    }

    /**
     * [createAction description]
     * @return [type] [description]
     */
    public function createAction($id = 20)
    {

        /**
         * http://docs.phalconphp.com/en/latest/reference/models.html#create-update-with-confidence
         *
         *  “create” also accept an array of values as parameter.
         */

        $acordo                   = new Acordos();
        $acordo->id               = $id;
        $acordo->datetime_acordo  = "2012-10-21";
        $acordo->instituicao      = "Sis portugal";
        $acordo->foto_instituicao = "sis.png";

        if ($acordo->create()) {
            echo "inserted successfully";
        } else {
            echo "not inserted successfully <br>";
            foreach ($acordo->getMessages() as $message) {
                echo "Message: ", $message->getMessage() . "<br>";
                echo "Field: ", $message->getField() . "<br>";
                echo "Type: ", $message->getType() . "<br>";
             }
        }

    }

    /**
     * foi definido um service para poder escrever a action camelcased
     * @return [type] [description]
     */
    public function storeRelatedAction()
    {
        echo "hello here <br>";

        // create an speciality
        $especialidade = new Especialidades();
        $especialidade->especialidade           = "Zoologia";
        $especialidade->descricao_especialidade = "Tratamento de pessoas meio animais";
        $especialidade->preco_consulta          = "24.99";

        // Create a doctor
        $medico = new Medicos();
        $medico->primeiro_nome  = "Javali";
        $medico->ultimo_nome    = "Valério";
        $medico->email          = "javali@gmail.com";
        $medico->contacto_tel   = "1761786786";
        $medico->foto           = "javali.png";
        $medico->especialidades = $especialidade; // magic property ->$especialidades : DB table
        $medico->horarios_id    = 2;
        $medico->salario_mensal = "18008";

        //Save both records
        if ($medico->create())
        {
            echo "saved (created or updated) successfully";
        }
        else
        {
            echo "not saved (created or updated) successfully <br>";
            foreach ($medico->getMessages() as $message)
            {
                echo "Message: ", $message->getMessage() . "<br>";
                echo "Field: ", $message->getField() . "<br>";
                echo "Type: ", $message->getType() . "<br>";
            }
        }

        echo "<hr>";

                // create an speciality
        $another_especialidade = new Especialidades();
        $another_especialidade->especialidade           = "Macacologia";
        $another_especialidade->descricao_especialidade = "Tratamento de pessoas meio macacas";
        $another_especialidade->preco_consulta          = "24.99";


        $multiple_medicos = array();

        $multiple_medicos[0] = new Medicos();
        $multiple_medicos[0]->primeiro_nome  = "Primeiro Multiplo";
        $multiple_medicos[0]->ultimo_nome    = "Valério";
        $multiple_medicos[0]->email          = "primeiro_multiplo@gmail.com";
        $multiple_medicos[0]->contacto_tel   = "1098198018";
        $multiple_medicos[0]->foto           = "primeiro_multiplo.png";
        $multiple_medicos[0]->horarios_id    = 1;
        $multiple_medicos[0]->salario_mensal = "1414";

        $multiple_medicos[1] = new Medicos();
        $multiple_medicos[1]->primeiro_nome  = "Segundo Multiplo";
        $multiple_medicos[1]->ultimo_nome    = "Valério";
        $multiple_medicos[1]->email          = "segundo_multiplo@gmail.com";
        $multiple_medicos[1]->contacto_tel   = "1198018";
        $multiple_medicos[1]->foto           = "segundo_multiplo.png";
        $multiple_medicos[1]->horarios_id    = 2;
        $multiple_medicos[1]->salario_mensal = "7071";

        $multiple_medicos[2] = new Medicos();
        $multiple_medicos[2]->primeiro_nome  = "Terceiro Multiplo";
        $multiple_medicos[2]->ultimo_nome    = "Valério";
        $multiple_medicos[2]->email          = "terceiro_multiplo@gmail.com";
        $multiple_medicos[2]->contacto_tel   = "081919101";
        $multiple_medicos[2]->foto           = "terceiro_multiplo.png";
        $multiple_medicos[2]->horarios_id    = 1;
        $multiple_medicos[2]->salario_mensal = "1871";

        // atenção a esta linha pois a variável tem de ser igual ao nome da tabela da bd
        $another_especialidade->medicos = $multiple_medicos;

        //Save both records
        if ($another_especialidade->create())
        {
            echo "saved (created or updated) successfully";
        }
        else
        {
            echo "not saved (created or updated) successfully <br>";
            foreach ($another_especialidade->getMessages() as $message)
            {
                echo "Message: ", $message->getMessage() . "<br>";
                echo "Field: ", $message->getField() . "<br>";
                echo "Type: ", $message->getType() . "<br>";
            }
        }

    }

    /**
     * [updateAction description]
     * @return [type] [description]
     */
    public function updateAction($id = 0)
    {
        /**
         * http://docs.phalconphp.com/en/latest/reference/models.html#create-update-with-confidence
         *
         * “update” also accept an array of values as parameter.
         */

        $acordo                   = new Acordos();
        $acordo->id               = $id;
        $acordo->datetime_acordo  = "2012-10-21";
        $acordo->instituicao      = "CIA";
        $acordo->foto_instituicao = "CIA.png";

        if ($acordo->update()) {
            echo "updated successfully";
        } else {
            echo "not updated successfully <br>";
            foreach ($acordo->getMessages() as $message) {
                echo "Message: ", $message->getMessage() . "<br>";
                echo "Field: ", $message->getField() . "<br>";
                echo "Type: ", $message->getType() . "<br>";
            }
        }
    }

    /**
     * [deleteAction description]
     * @param  integer $medico_id [description]
     * @return [type]             [description]
     */
    public function deleteAction($medico_id = 0)
    {
        $doctor = Medicos::findFirst($medico_id);
        if ($doctor == TRUE)
        {
            if ($doctor->delete() == false)
            {
                echo "Sorry, we can't delete the doctor right now: \n";
                foreach ($doctor->getMessages() as $message)
                {
                    echo "Message: ", $message->getMessage() . "<br>";
                    echo "Field: ", $message->getField() . "<br>";
                    echo "Type: ", $message->getType() . "<br>";
                }
            }
            else
            {
                echo "The doctor was deleted successfully!";
            }
        }
        else{
            echo "The doctor doesn't exist yet or anymore";
        }

        /**
         *  we can also delete many records by traversing a resultset with a foreach:
         *
         * foreach (Medicos::find("type='blahblah'") as $medico) {
         *     if ($medico->delete() == false) {
         *         echo "Sorry, we can't delete the doctor right now: \n";
         *         foreach ($medico->getMessages() as $message) {
         *             echo $message, "\n";
         *         }
         *     } else {
         *         echo "The doctor was deleted successfully!";
         *     }
         * }
         */
    }

}

