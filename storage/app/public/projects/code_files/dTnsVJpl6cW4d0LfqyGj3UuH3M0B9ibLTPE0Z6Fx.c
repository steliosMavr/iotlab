/* Arduino Bluetooth Car
 * Created by Vasilakis Michalis // 2/4/17
 * More information at www.ardumotive.com
 */

//βιβλιοθήκη για να έχουμε ακόμα ένα εικονικό περιφερικό USART Rx,Tx με ακροδέκτες Α2,Α3
#include <SoftwareSerial.h> 

SoftwareSerial btSerial(A2,A3); // RX & TX
const int motorA1 = 5;  // ακροδέκτης 2 of L293
const int motorA2 = 3;  // ακροδέκτης 7 of L293
const int motorB1 = 11; // ακροδέκτης 10 of L293
const int motorB2 = 10; // ακροδέκτης 14 of L293
const int lights = 8;  // ακροδέκτης 8 για τα φώτα
const int buzzer = 2 ; // ακροδέκτης 2 για κορνα, buzzer 5v
int i=0;   // μεταβλητή τύπου integer
int j=0;   // μεταβλητή τύπου integer
int state; // μεταβλητή τύπου integer


void setup() { // αρχικοποίηση προγράμματος
pinMode(motorA1,OUTPUT);// ορισμός ακροδέκτης σαν έξοδος
pinMode(motorA2,OUTPUT);// ορισμός ακροδέκτης σαν έξοδος
pinMode(motorB1,OUTPUT);// ορισμός ακροδέκτης σαν έξοδος
pinMode(motorB2,OUTPUT);// ορισμός ακροδέκτης σαν έξοδος
pinMode(lights,OUTPUT); // ορισμός ακροδέκτης σαν έξοδος
btSerial.begin(9600); // ρυθμός δειγματοληψίας 9600 Kbps
Serial.begin(9600); // ρυθμός δειγματοληψίας 9600 Kbps
}

void loop() {
//αποθήκευσε τα δεδομένα από το Bluetooth στην μεταβλητή 'state'  όταν εισέρχονται  
 //δεδομένα,(χαρακτήρας),τύπωσε τα στο serial monitor 

if(btSerial.available() > 0){
state = btSerial.read(); 
Serial.println(state); 
}
/********************** κίνηση μπροστά ***************************/
//εάν η μεταβλητή state περιέχει τον χαρακτήρα F, πήγαινε μπροστά!
if (state == 'F') {
digitalWrite(motorA1, HIGH); digitalWrite(motorA2, 0);
digitalWrite(motorB1, 0);digitalWrite(motorB2, 0); 
}

/********************κίνηση μπροστά και αριστερά ************/
//εάν η μεταβλητή state περιέχει τον χαρακτήρα G, πήγαινε μπροστά και //αριστερά!

else if (state == 'G') {
digitalWrite(motorA1, HIGH); digitalWrite(motorA2, 0);
digitalWrite(motorB1, HIGH);digitalWrite(motorB2, 0);
                        }
/********************** μπροστά και δεξιά ************************/
//εάν η μεταβλητή state περιέχει τον χαρακτήρα Ι, πήγαινε μπροστά και  δεξιά!

else if (state == 'I') {
digitalWrite(motorA1, HIGH);digitalWrite(motorA2, 0); 
digitalWrite(motorB1, 0);digitalWrite(motorB2, HIGH); 
                        }
/*********************** κίνηση πισω ****************************/
//εάν η μεταβλητή state περιέχει τον χαρακτήρα Β, πήγαινε πίσω!

else if (state == 'B') {
digitalWrite(motorA1, 0);digitalWrite(motorA2, HIGH);
digitalWrite(motorB1, 0);digitalWrite(motorB2, 0);
}
/**********************πίσω αριστερά ************************/
//εάν η μεταβλητή state περιέχει τον χαρακτήρα Η, πήγαινε πίσω  αριστερά!

else if (state == 'H') {
digitalWrite(motorA1, 0);digitalWrite(motorA2, HIGH); 
digitalWrite(motorB1, HIGH); digitalWrite(motorB2, 0); 
                        }
/********************** πίσω αριστερά ************************/
//εάν η μεταβλητή state περιέχει τον χαρακτήρα J, πήγαινε πίσω   δεξιά!

else if (state == 'J') {
digitalWrite(motorA1, 0);digitalWrite(motorA2, HIGH);
digitalWrite(motorB1, 0);digitalWrite(motorB2, HIGH);
                        }
/*************************** αριστερά *****************************/
//εάν η μεταβλητή state περιέχει τον χαρακτήρα L, κάνε τους τροχούς αριστερά

else if (state == 'L') {
digitalWrite(motorA1, 0);digitalWrite(motorA2, 0); 
digitalWrite(motorB1, HIGH);digitalWrite(motorB2, 0); 
                        }
/*************************** δεξιά *****************************/
//εάν η μεταβλητή state περιέχει τον χαρακτήρα L, κάνε τους τροχούς δεξιά

else if (state == 'R') {
digitalWrite(motorA1, 0);digitalWrite(motorA2, 0); 
digitalWrite(motorB1, 0);digitalWrite(motorB2, HIGH); 
                        }

/************************φώτα*****************************/

 // εάν η μεταβλητή state περιέχει τον χαρακτήρα W, άναψε ή σβήσε τα φώτα
else if (state == 'W') {
  if (i==0){
   digitalWrite(lights, HIGH); 
   i=1;
          }
  else if (i==1){
    digitalWrite(lights, LOW); 
    i=0;
         }
state='n';  // ΄έξοδος απο το state W
                        }

/**********************κόρνα***************************/

// εάν η μεταβλητή state περιέχει τον χαρακτήρα V, οδήγησε το buzzer με  έξοδο pwm. Ανάλογα    
  // την συχνότητα έχουμε και την αντίστοιχη διαμόρφωση //ηχου. 

 else if (state == 'V'){
  if (j==0){ 
  tone(buzzer, 1000);//Speaker on 
  j=1;
          }
  else if (j==1){
   noTone(buzzer);//Speaker off 
  j=0;
                }
state='n';
                        }

/************************ σταμάτημα *****************************/

// εάν η μεταβλητή state περιέχει τον χαρακτήρα S, σταμάτα το αμάξι

else if (state == 'S'){
digitalWrite(motorA1, 0); digitalWrite(motorA2, 0); 
digitalWrite(motorB1, 0); digitalWrite(motorB2, 0);
                      }
       } // τελος loop