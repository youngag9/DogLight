#include <SoftwareSerial.h>


// Tx,Rx ���� 2,3�� �ɿ� ����
SoftwareSerial bluetooth(2, 3); 

void setup()  
{
  // ����
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
 //������� ����� Ȱ��ȭ �� ���¿��� ���� �о�´�.
 if(bluetooth.available()){
  // ��������� ���� ���ڸ� �о���δ�.
  char read= bluetooth.read();
  //�о���� ���ڰ��� ���� ���� ó���Ѵ�.
  if(read=='1'){
    //Red LED �� ON
    digitalWrite(12,HIGH); 
    
  }
  if(read=='0'){
	//Red LED �� OFF
        digitalWrite(12,LOW);
  
  }
  if(read=='2'){
    //Green LED �� ON
    digitalWrite(11,HIGH);
    
  
  }
  if(read=='3'){
   //Green LED �� OFF
    digitalWrite(11,LOW);
    
  }
  if(read=='4'){
    //Yellow LED �� ON
    digitalWrite(10,HIGH);
    
  }
  if(read=='5'){
	 //Yellow LED �� OFF
    digitalWrite(10,LOW);
    
  }
  if(read=='6'){
    // ��ü LED �� ON
    digitalWrite(10,HIGH);
    digitalWrite(11,HIGH);
    digitalWrite(12,HIGH);
  
  }
  if(read=='7'){
  // ��ü LED �� OFF
    digitalWrite(10,LOW);
    digitalWrite(11,LOW);
    digitalWrite(12,LOW);
    
  
  }
    }
    
  }
