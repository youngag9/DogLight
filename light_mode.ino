#include <SoftwareSerial.h>


// Tx,Rx 각각 2,3번 핀에 연결
SoftwareSerial bluetooth(2, 3); 

void setup()  
{
  // 시작
  Serial.begin(9600); 
  bluetooth.begin(9600);
  //Red LED
  pinMode(12,OUTPUT);
  //Green LED
  pinMode(11,OUTPUT);
  //Yellow LED
  pinMode(10,OUTPUT);
}

void loop()
{
 //블루투스 기능이 활성화 된 상태에서 값을 읽어온다.
 if(bluetooth.available()){
  // 블루투스를 통해 문자를 읽어들인다.
  char read= bluetooth.read();
  //읽어들인 문자값에 따라 각각 처리한다.
  if(read=='1'){
    //Red LED 를 ON
    digitalWrite(12,HIGH); 
    
  }
  if(read=='0'){
	//Red LED 를 OFF
        digitalWrite(12,LOW);
  
  }
  if(read=='2'){
    //Green LED 를 ON
    digitalWrite(11,HIGH);
    
  
  }
  if(read=='3'){
   //Green LED 를 OFF
    digitalWrite(11,LOW);
    
  }
  if(read=='4'){
    //Yellow LED 를 ON
    digitalWrite(10,HIGH);
    
  }
  if(read=='5'){
	 //Yellow LED 를 OFF
    digitalWrite(10,LOW);
    
  }
  if(read=='6'){
    // 전체 LED 를 ON
    digitalWrite(10,HIGH);
    digitalWrite(11,HIGH);
    digitalWrite(12,HIGH);
  
  }
  if(read=='7'){
  // 전체 LED 를 OFF
    digitalWrite(10,LOW);
    digitalWrite(11,LOW);
    digitalWrite(12,LOW);
    
  
  }
    }
    
  }
