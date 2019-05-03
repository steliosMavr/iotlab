#include <LiquidCrystal.h>

// αντιστοιχια ακροδεκτών μικροελεγκτή με lcd σε 8-bit πληροφορία
//               rs,enable, d4-d7
LiquidCrystal lcd(7,6,5,4,3,2); // ακροδέκτες Arduino

// μεταβλητές προγράμματος
int val,i,flag,diktis=0;
int layer=1;
int a=0;
int selectsecond,sec=0;
int minutes=0;
int ledboard=13;
int buzzer=A0;
int rele=A1;
int up=A2;
int down=A3;
int enter=A4;
int cover = 8;
int l=0;  // τοπικη μεταβλητη για χρηση μονο στην παρακατω if 


ISR(TIMER1_OVF_vect) {  // συνάρτηση κλήσης overflow timer1 καθε 1 δευτερόλεπτο
  TCNT1=3036;
    digitalWrite(13, digitalRead(13) ^ 1);   
     sec --;  
if (sec==0) {
       digitalWrite(rele,HIGH);
        TCCR1B=0x00; //σταμάτησε το ρολοι timer1
                   }
                     }
                     
void setup() { 
Serial.begin(9600);


pinMode(ledboard,OUTPUT); pinMode(buzzer,OUTPUT); pinMode(rele,OUTPUT);
 digitalWrite(buzzer,LOW); digitalWrite(rele,LOW);
 
pinMode(up,INPUT); pinMode(down,INPUT); pinMode(enter,INPUT); pinMode(cover,INPUT);
 digitalWrite(up,HIGH); digitalWrite(down,HIGH); digitalWrite(enter,HIGH);  digitalWrite(cover,HIGH);

TCCR1A= 0x00; 
TCCR1B=0x00; //υποδιαίρεση κρυστάλλου 256=0X04. το ρολοι ειναι σταματημενο
TCNT1=3036;  // προ-φόρτωση μετρητή για να δίνει overflow κάθε 1sec 
TIMSK1=0x01; // ενεργοποίηση overflow
SREG|=0X80; // γενική ενεργοποίηση interrupt

Serial.begin(9600);


lcd.begin(16, 2); // δηλώνουμε τις στήλες και τις γραμμές της lcd
lcd.setCursor(4,0); // δηλώνουμε την αρχή του κέρσορα:
lcd.print("PCB  UV");// τυπώνει το μήνυμα στην οθόνη
lcd.setCursor(5,1); // δηλώνουμε την αρχή του κέρσορα:
lcd.print(" TEST");// τυπώνει το μήνυμα στην οθόνη

delay(2000);
lcd.setCursor(0,0); // δηλώνουμε την αρχή του κέρσορα:
lcd.print("Choose from menu");// τυπώνει το μήνυμα στην οθόνη
lcd.setCursor(0,1); // δηλώνουμε την αρχή του κέρσορα:
lcd.print(" Time explosing");// τυπώνει το μήνυμα στην οθόνη
digitalWrite(buzzer,HIGH); digitalWrite(rele,HIGH);           
                     }

void loop() {

if (digitalRead(up)==LOW && flag==0) {  //η σημαια χρησιμοποιηται για να μην βγαινει απο το προγραμμα οταν επιλεξουμε να τρεξει ο χρονος
       a=a-1;
        if (a<=1)
               a=1;      }
       
if (digitalRead(down)==LOW && flag==0) {
    a=a+1;
     if (a>=6)
            a=5;           }


switch (a){
 case 1: {
           lcd.clear();
           lcd.setCursor(0,0); // δηλώνουμε την αρχή του κέρσορα:
           lcd.print("choose side pcb:");// τυπώνει το μήνυμα στην οθόνη
           lcd.setCursor(0,1);
           lcd.print ("layer:");// τυπώνει το μήνυμα στην οθόνη
           lcd.setCursor(7,1);
           lcd.print (layer); // τυπώνει το μήνυμα στην οθόνη

           if (digitalRead(enter)==LOW) {
             layer=layer+1;
              if (layer>=3) 
                     layer=1;
                                         }                    
           delay(300);
           break;                                                            } 
                       
 case 2: {
           lcd.clear();
           lcd.setCursor(0,0); // δηλώνουμε την αρχή του κέρσορα:
           lcd.print("PROGRAMM 2");// τυπώνει το μήνυμα στην οθόνη
           lcd.setCursor(0,1);
           lcd.print ("1 min + 20 sec");// τυπώνει το μήνυμα στην οθόνη
           sec= 10;
           delay(300);
           break;                                                             } 
 case 3: {
           lcd.clear();
           lcd.setCursor(0,0); // δηλώνουμε την αρχή του κέρσορα:
           lcd.print("PROGRAMM 3");// τυπώνει το μήνυμα στην οθόνη
           lcd.setCursor(0,1);
           lcd.print ("3 min + 00 sec");// τυπώνει το μήνυμα στην οθόνη
           sec= 180;
           delay(300);
           break;                                                          }    
 case 4: {
           lcd.clear();
           lcd.setCursor(0,0); // δηλώνουμε την αρχή του κέρσορα:
           lcd.print("PROGRAMM 4");// τυπώνει το μήνυμα στην οθόνη
           lcd.setCursor(0,1);
           lcd.print ("4 min + 00 sec");// τυπώνει το μήνυμα στην οθόνη
           sec= 240;
           delay(300);
           break;                                                                          }
case 5: {  //εισαγωγη χρονου με το ποντεσιομετρο και την analogRead
             
          lcd.clear();
          lcd.setCursor(0,0); // δηλώνουμε την αρχή του κέρσορα:
          lcd.print("Set manual time");// τυπώνει το μήνυμα στην οθόνη
          lcd.setCursor(0,1);
          lcd.print ("  Time(sec):");// τυπώνει το μήνυμα στην οθόνη
          lcd.print(sec);        
          val=analogRead(A5);
          int y=map(val,1,1024,1,600); // ο χρονος αντιστοιχει απο 0 εως 600 δευτερολεπτα
          sec=y;
          delay(300);
          break;
         }             
           } // τελος case

             
 if (digitalRead(enter)==LOW && a>=2 && a<=5) { // συναρτηση ενεργοποιησης του timer1 σαν χρονιστής, τροφοδοσια στις λαμπες uv 
          TCCR1B=0x04; //ξεκινα να μετραει το ρολοι του timer1 
          digitalWrite(rele,LOW);  
          lcd.clear();
          a=0;
          i=0;
          selectsecond=sec;
          flag=1;             }


     
if (flag==1) {
         if (diktis==0){
         digitalWrite(rele,LOW);
         lcd.clear();
         lcd.setCursor(0,0); // δηλώνουμε την αρχή του κέρσορα:
         lcd.print(" Time remaining");// τυπώνει το μήνυμα στην οθόνη
         lcd.setCursor(6,1);
         minutes= (sec / 60);
         lcd.print(minutes);
         lcd.print(":");
         lcd.print(sec -(minutes*60));
         lcd.write(32);
         delay(300);                                                    }

                                                      
         if (digitalRead(cover)==LOW && flag==1)  {
         digitalWrite(rele,HIGH);
         TCCR1B=0x00; //σταμάτησε το ρολοι timer1
         diktis=1;
         lcd.clear(); 
         lcd.setCursor(0,0); // δηλώνουμε την αρχή του κέρσορα:
         lcd.print("  Time stopped");// τυπώνει το μήνυμα στην οθόνη
         lcd.setCursor(0,1);
         lcd.print(" Close the cover");
         delay(500);
                                                                           } 
             else {
                    TCCR1B=0x04; //ekkinhse το ρολοι timer1
                    diktis=0;
                    
                                                                            }  
         if (sec==0 ) {     //--------------------------
         lcd.clear();
         lcd.setCursor(0,0); // δηλώνουμε την αρχή του κέρσορα:
         lcd.print("    Ready!!");// τυπώνει το μήνυμα στην οθόνη
         lcd.setCursor(0,1); // δηλώνουμε την αρχή του κέρσορα:
         lcd.print("   Remove pcb");// τυπώνει το μήνυμα στην οθόνη
         digitalWrite(buzzer,LOW);
         delay(2000);
         digitalWrite(buzzer,HIGH);
         TCCR1B=0x00; //σταμάτησε το ρολοι timer1 //////////////
         flag=2;                  
                                                                          }
               } //TELOS flag 1
                                                                                                                                                                                               
if (flag==2 && layer==1) {

     
       if (digitalRead(cover)==LOW) {   // otan bgaloyme thn plaketa na synexisei sto programma kai stis epiloges
       lcd.clear();
       lcd.setCursor(0,0); // δηλώνουμε την αρχή του κέρσορα:
       lcd.print("Choose from menu");// τυπώνει το μήνυμα στην οθόνη
       lcd.setCursor(0,1); // δηλώνουμε την αρχή του κέρσορα:
       lcd.print(" Time explosing");// τυπώνει το μήνυμα στην οθόνη
       flag=0;                                                         }
                        }
                        

if (flag==2 && i==1 ) {
  
    if (digitalRead(cover)==LOW) {   // otan bgaloyme thn plaketa na synexisei sto programma kai stis epiloges
       lcd.clear();
       lcd.setCursor(0,0); // δηλώνουμε την αρχή του κέρσορα:
       lcd.print("Choose from menu");// τυπώνει το μήνυμα στην οθόνη
       lcd.setCursor(0,1); // δηλώνουμε την αρχή του κέρσορα:
       lcd.print(" Time explosing");// τυπώνει το μήνυμα στην οθόνη
       flag=0;                                                         }
                                                                       }

if (flag==2 && layer==2 && i<1) {  
               
        
        lcd.setCursor(0,0); // δηλώνουμε την αρχή του κέρσορα:
        lcd.print("Please place pcb and close cover");// τυπώνει το μήνυμα στην οθόνη
        lcd.setCursor(0,1);  // δηλώνουμε την αρχή του κέρσορα:
        lcd.print(" For starting layer two ");// τυπώνει το μήνυμα στην οθόνη
        lcd.scrollDisplayLeft();
              
        delay(400);
               
                          
               if (digitalRead(cover)==LOW){   //  
        
                l=1;
                                                  } // τυπώνει το μήνυμα στην οθόνη  
                 
                 if (digitalRead(cover)==HIGH && l==1) {                                                     
                 sec=selectsecond;
                 i=i+1;
                 l=0;
                 flag=1;  }
                                 }               
                                                                                
            } // τέλος loop
