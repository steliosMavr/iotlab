@extends('layouts.app')

@section('content')




<div class="container">
    
   
    <div class="container position-relative" id="content">
        <div class="row h-100 mt-5">
           
            <main class="col-md-9 py-5">
                <div class="row position-relative">
                    <div class="col">
                      
                        <div class="tab-content py-3 position-relative">
                            <div class="tab-pane active position-relative" id="tab1" role="tabpanel">

                                <h3 class="mb-3 text-center">Τα Μικροϋπολογιστικά Συστήματα Σήμερα</h3>

                                <div class="anchor" id="sec1"></div>
                               
                                <p>Αν συγκρίνει κανείς τις δυνατότητες των μικροεπεξεργαστών ή μικροελεγκτών που χρησιμοποιούνται σε μικροϋπολογιστικά συστήματα με τις αντίστοιχες των επεξεργαστών των μεγάλων συστημάτων, (mainframes), ή ακόμα και των προσωπικών υπολογιστών (PC), η διαφορά είναι μεγάλη σε πολλά επίπεδα. Οι ταχύτητες λειτουργίας είναι χαμηλότερες, τα μεγέθη μνήμης που μπορούν να διαχειριστούν πολύ περιορισμένα κλπ. Όμως μια τέτοια σύγκριση είναι άδικη δεδομένου ότι δεν προορίζονται για τις ίδιες εφαρμογές. Παρότι πριν από 15-20 χρόνια επεξεργαστές 8-bit χρησιμοποιούνταν ευρέως σε προσωπικούς υπολογιστές, σήμερα η χρήση τους είναι τελείως διαφορετική.</p>

                                <p>Υπάρχει μια σειρά από εφαρμογές ειδικού σκοπού πον δεν έχουν την ανάγκη των επιδόσεων των σύγχρονων επεξεργαστών 64-bit. Σαν τέτοιες εφαρμογές μπορεί να αναφέρει κανείς τους ενσωματωμένους μικροϋπολογιστές σε οικιακές συσκευές, συστήματα ασφαλείας, συστήματα ελέγχου αυτοκινήτων, ρομποτικά συστήματα, παραγωγικές μονάδες όπως θερμοκήπια και βιοτεχνίες, όργανα μετρήσεων όπως ιατρικά και ηλεκτρονικά όργανα, μετεωρολογικοί σταθμοί, παιχνιδομηχανές κλπ. Σε τέτοιες εφαρμογές η χρήση ισχυρότερων επεξεργαστών από αυτούς που πραγματικά χρειάζονται προσθέτει όχι μόνο κόστος, που μπορεί να είναι πολύ κρίσιμο, αλλά και ανεπιθύμητη αύξηση πολυπλοκότητας, κατανάλωση ενέργειας, διαστάσεων κλπ. Για το λόγο αυτό διατίθεται σήμερα μια πλειάδα μικροελεγκτών που ενσωματώνουν στο ίδιο ολοκληρωμένο κύκλωμα την ΚΜΕ μαζί με έναν αριθμό περιφερειακών όπως μνήμη, χρονιστές/μετρητές, ακροδέκτες γενικής χρήσεως , DAC και ADC, σειριακές και παράλληλες Θύρες επικοινωνίας . Διαλέγοντας το κατάλληλο μικροελεγκτή για μία εφαρμογή μπορεί να ελαχιστοποιηθεί το πλήθος των απαιτούμενων εξωτερικών εξαρτημάτων. Σε εφαρμογές που οι ανάγκες μνήμης ξεφεύγουν πολύ από τα μεγέθη που διαθέτουν οι ενσωματωμένες μνήμες σε μικροελεγκτές, είναι δυνατή η χρήση κάποιου μικροεπεξεργαστή στους διαύλους του οποίου μπορούν να συνδεθούν μνήμη κατάλληλου μεγέθους και τα απαραίτητα περιφερειακά.</p>

                                <p>Αν ξεκινήσουμε από τα πιο στοιχειώδη τμήματα ενός υπολογιστή, μπορούμε να πούμε ότι ανεξάρτητα από τα μεγέθη όλα τα μικροϋπολογιστικά συστήματα καθώς και οι μεγαλύτεροι υπολογιστές αποτελούνται από τα ίδια βασικά τμήματα: ΚΜΕ, μονάδες Ι/Ο, μνήμη, και σύστημα χρονισμού (ρολόι). Η ΚΜΕ διαχειρίζεται πληροφορία σύμφωνα με τις οδηγίες ενός προγράμματος εντολών. Διαχειρίζεται επίσης ένα πλήθος γραμμών ελέγχου που της δίνουν τη δυνατότητα να ελέγξει τα περιφερειακά και να επικοινωνήσει με τον έξω κόσμο. Μερικά περιφερειακά εισόδου χρειάζεται να μετατρέψουν αναλογικά σήματα σε δυαδικά ψηφία που σε επίπεδο κυκλώματος αντιστοιχούν σε 0 και 5V , (π.χ. αισθητήρας Θερμοκρασίας). Άλλες μονάδες εισόδου που στηρίζονται στη χρήση διακοπτών μπορούν να παράσχουν κατευθείαν τις δύο αυτές καταστάσεις όπως ένα πληκτρολόγιο. Τις καταστάσεις αυτές τις δέχεται η ΚΜΕ σαν είσοδο. Στις συσκευές εξόδου η ΚΜΕ αποστέλλει ψηφιακά δεδομένα τα οποία οι συσκευές αυτές μπορούν να μετατρέψουν σε άλλης μορφής σήματα, για να δώσουν στον έξω κόσμο τα αποτελέσματα της επεξεργασίας των δεδομένων εισόδου. Τέτοιες συσκευές μπορεί να είναι οθόνες, beeper, ηλεκτρονόμοι κλπ. Ένα υπολογιστικό σύστημα διαθέτει συνήθως περισσότερες από μία μονάδες εισόδου / εξόδου. Υπάρχει συχνά σημαντική διαφορά μεταξύ των μονάδων εισόδου και εξόδου ενός μικροϋπολογιστικού συστήματος και των άλλων υπολογιστών όπως π.χ ενός προσωπικού υπολογιστή. Σε έναν προσωπικό υπολογιστή η βασική μονάδα εισόδου είναι το πληκτρολόγιο και το ποντίκι, ενώ συμπληρωματική είσοδος μπορεί να δοθεί από συσκευές όπως ο σαρωτής , το μικρόφωνο κλπ. Επίσης σε ένα PC η κύρια έξοδος είναι η οθόνη και ο εκτυπωτής. Δεδομένου όμως ότι ένα μικροϋπολογιστικό σύστημα προορίζεται σήμερα κυρίως για εφαρμογές ελέγχου, οι εισόδοι και έξοδοί του είναι σήματα από αισθητήρες (sensors) και ενεργοποιητές , (actuators) ή διακόπτες. Π.χ, σε ένα σύστημα συναγερμού ο ενσωματωμένος μικροεπεξεργαστής δέχεται είσοδο από αισθητήρες υπέρυθρων ακτίνων, θορύβου, καπνού, υγρασίας κλπ, για να ανιχνεύσει αν εισήλθε κάποιος ή αν έχει εκδηλωθεί πυρκαγιά / πλημμύρα στον προστατευόμενο χώρο. Η κύρια έξοδος ενός τέτοιου συστήματος είναι η σειρήνα, ο φάρος και η κλήση τηλεφώνου (dialer). Στα περισσότερα συστήματα συναγερμού υπάρχει ένα στοιχειώδες πληκτρολόγιο (keypad) και μια LCD οθόνη, των οποίων όμως η χρήση είναι περισσότερο βοηθητική. Όλα τα chip μικροελεγκτών διαθέτουν δυνατότητα σύνδεσης με ένα τερματικό για να μπορούμε να το προγραμματίσουμε. Για τη σύνδεση αυτή απαιτούνται ορισμένα ηλεκτρονικά εξαρτήματα. Η συνήθης διαδικασία προγραμματισμού είναι:</p>

                        <ul class="m-0 p-0 ml-3">

                        <li>επιλογή του κατάλληλου μικροελεγκτή ή μικροελεγτική μοναδα ,(μικροελεγκτης με μνήμη RAM και ελαχιστο hardware).</li>
                        <li>σύνδεση με έναν ηλεκτρονικό υπολογιστή.</li>
                        <li>να τον προγραμματίζουμε να εκτελεί ένα συγκεκριμένο πρόγραμμα και</li>
                        <li>να τον τοποθετήσουμε στη συγκεκριμένη εφαρμογή, για να εκτελέσει τη λειτουργία που του έχουμε ορίσει, όπως έλεγχος στροφών κινητήρα, σύστημα πυρασφάλειας, χρονοδιακόπτης και πολλές άλλες εφαρμογές.</li>


                        </ul>
                               

                                <div class="anchor mt-3" id="sec2"></div>
                                <h3 class="mb-3 text-center">1.1 Μικροελεγκτές ATMEL AVR</h3>

                                <div class="anchor" id="sec5"></div>
                                <h5>5</h5>
                                <p>Ethical Kickstarter PBR asymmetrical lo-fi. Dreamcatcher street art Carles, stumptown gluten-free Kickstarter artisan Wes Anderson wolf pug. Godard sustainable you probably haven't heard of them, vegan farm-to-table Williamsburg
                                    slow-carb readymade disrupt deep v. Meggings seitan Wes Anderson semiotics, cliche American Apparel whatever. Helvetica cray plaid, vegan brunch Banksy leggings +1 direct trade. Wayfarers codeply PBR selfies. Banh mi
                                    McSweeney's Shoreditch selfies, forage fingerstache food truck occupy YOLO Pitchfork fixie iPhone fanny pack art party Portland.</p>

                                <div class="anchor" id="sec6"></div>
                                <h5>6</h5>
                                <p>Ethical Kickstarter PBR asymmetrical lo-fi. Dreamcatcher street art Carles, stumptown gluten-free Kickstarter artisan Wes Anderson wolf pug. Godard sustainable you probably haven't heard of them, vegan farm-to-table Williamsburg
                                    slow-carb readymade disrupt deep v. Meggings seitan Wes Anderson semiotics, cliche American Apparel whatever. Helvetica cray plaid, vegan brunch Banksy leggings +1 direct trade. Wayfarers codeply PBR selfies. Banh mi
                                    McSweeney's Shoreditch selfies, forage fingerstache food truck occupy YOLO Pitchfork fixie iPhone fanny pack art party Portland.</p>
                            </div>
                            

                        </div>
                    </div>
                </div>
            </main>
            <aside class="col  bg-light mt-5 ml-3" id="left">
                <div class="sticky-top" id="side">
                    <ul class="nav flex-md-column flex-row justify-content-between" id="sidenav">
                        <li class="nav-item"><a href="#sec1" class="nav-link active pl-0">One</a></li>
                        <li class="nav-item"><a href="#sec2" class="nav-link pl-0">Two</a></li>
                       
                        <li class="nav-item"><a href="#sec4" class="nav-link pl-0">Four</a></li>
                        <li class="nav-item"><a href="#sec5" class="nav-link pl-0">Five</a></li>
                        <li class="nav-item"><a href="#sec6" class="nav-link pl-0">Six</a></li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>
   



@endsection