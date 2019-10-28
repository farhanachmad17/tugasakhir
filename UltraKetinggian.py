import time
import httplib, json
import Rpi.GPIO as GPIO
GPIO.setmode(GPIO.BOARD)

TRIG = 11
ECHO = 12

GPIO.setup(TRIG,GPIO.OUT)
GPIO.setup(ECHO,GPIO.IN)

while True:
    GPIO.output(TRIG, False)
    print "Pengukuran Dimulai"
    time.sleep(2)
    GPIO.output(TRIG, True)
    time.sleep(0.00001)
    GPIO.output(TRIG, False)

    while GPIO.input(ECHO)==0:
        pulse_start = time.time()

    while GPIO.input(ECHO)==1:
        pulse_end = time.time()

    pulse_duration = pulse_end - pulse_start

    distance = pulse_duration * 17150
    distance = round(distance, 2)

    if distance > 2 and distance < 400:
        print"Ketinggian Air :", distance, "CM"

        #Kirim Data Ke Server
        headers = { "charset" : "utf-8", "Content-Type": "applicant/json" }
        conn = httplib.HTTPConnection("127.0.0.0")
        sample = { "ketinggian" : Ketinggian}
        sampleJson = json.dumps(sample, ensure_ascii = 'False')
        conn.request("POST", "/ketinggian/masuk.php", sampleJson, headers)
        response = conn.getresponse()
        print(response.read())
        conn.close()
    else:
        print"Jarak diluar Jangkauan"
