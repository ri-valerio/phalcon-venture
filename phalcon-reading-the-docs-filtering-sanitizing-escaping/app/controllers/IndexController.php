<?php

class IndexController extends ControllerBase
{

    public function indexAction($planet = null)
    {
	    echo "<h3>IndexController - indexAction</h3>";

	    //	    SANITIZING DATA
	    //Sanitizing is the process which removes specific characters from a value,
	    // that are not required or desired by the user or application .
	    // By sanitizing input we ensure that application integrity will be intact .


//	    TYPES OF BUILT - IN FILTERS

//The following are the built - in filters provided by this component:

//    string 	Strip tags and escapes HTML entities,
//              including single and double quotes.
//    email 	Remove all characters except letters, digits and !#$%&*+-/=?^_`{|}~@.[].
//    int 	    Remove all characters except digits, plus and minus sign .
//    float     Remove all characters except digits, dot, plus and minus sign .
//    alphanum 	  Remove all characters except [a - zA - Z0 - 9]
//    striptags   Applies the strip_tags function
//    trim 	    Applies the trim function
//    lower 	Applies the strtolower function
//    upper 	Applies the strtoupper function

	    // returns "someone@example.com"
	    echo "<h4>Filter - email - some(one)@exa\mple.com</h4>";
	    echo $this->filter->sanitize("some(one)@exa\mple.com", "email");
	    echo "<hr>";

	    // returns "hello"
	    echo "<h4>Filter - string - hello<<</h4>";
	    echo $this->filter->sanitize("hello<<", "string");
	    echo "<hr>";

	    // returns "100019"
	    echo "<h4>Filter - int - !100a019</h4>";
	    echo $this->filter->sanitize("!100a019", "int");
	    echo "<hr>";

	    // returns "100019.01"
	    echo "<h4>Filter - float - !100a019.01a</h4>";
	    echo $this->filter->sanitize("!100a019.01a", "float");
	    echo "<hr>";

	    // returns the alphanum chars
	    echo "<h4>Filter - alphanum - !utu27!™†ƒßı√ˇßå@a</h4>";
	    echo $this->filter->sanitize("!utu27!™†ƒßı√ˇßå@a", "alphanum");
	    echo "<hr>";

	    // returns "Hello"
	    echo "<h4>Filter - striptags - h2 entity</code></h4>";
	    echo $this->filter->sanitize("<h2>Hello</h2>", "striptags");
	    echo "<hr>";

	    // returns "smile"
	    echo "<h4>Filter - trim - '  smile   '</h4>";
	    echo $this->filter->sanitize("     smile     ", "trim");
	    echo "<hr>";

	    // returns "macbook"
	    echo "<h4>Filter - lower - MACBOOK</h4>";
	    echo $this->filter->sanitize("MACBOOK", "lower");
	    echo "<hr>";

	    // returns "APPLE"
	    echo "<h4>Filter - upper - apple</h4>";
	    echo $this->filter->sanitize("apple", "upper");
	    echo "<hr>";

	    // é possível ainda adicionarmos os nossos próprios filters
	    // seguindo o exemplo da documentação no link:
	    // http://docs.phalconphp.com/en/latest/reference/filter.html#creating-your-own-filters
	    $this->filter->add('my-filter', function ($value) {
		    return preg_replace('/[^0-9a-f]/', '', $value);
	    });

	    echo "<h4>Filter - my-filter - ph3al7con13</h4>";
	    echo $this->filter->sanitize("ph3al7con13", "my-filter");
	    echo "<hr>";




		//	    We can access a Phalcon\Filter object from your controllers when
		// accessing GET or POST input data(through the request object).
		// The first parameter is the name of the variable to be obtained;
		// the second is the filter to be applied on it .

	    if ($this->request->hasQuery("numero")) {
		    // display the number filtered if it was passed on the url
		    echo "The number was " . $this->request->getQuery("numero") .
		         " and now filtered is: " . $this->request->getQuery("numero", "int") . "<br>";
	    }

	    if ($this->request->hasQuery("email")) {
		    // display the number filtered if it was passed on the url
		    echo "The email was " . $this->request->getQuery("email") .
			    " and now filtered is: " . $this->request->getQuery("email", "email") . "<br>";
	    }

	    if ($planet != null) {
		    echo "The planet was " . $planet .
			    " and now filtered is: " . $this->filter->sanitize($planet, "alphanum") . "<br>";
	    }

	    // para filters mais complexos:
	    // http://docs.phalconphp.com/en/latest/reference/filter.html#complex-sanitizing-and-filtering
    }
}

