move = int(input("請輸入活動量(1:輕度,2：中度,3：重度)"))
h = float(input("請輸入身高(公尺)"))
w = int(input("請輸入體重(公斤)"))

h = float(h)

bmi = (w/(h*h))

if bmi >= 24 :
    if move == 1:
        n = 25 * w 
    if move == 2:
        n = 30 * w
    if move == 3:
        n = 35 * w
        
if  24 >  bmi >= 18.5 :
    if move == 1:
        n = 30 * w
    if move == 2:
        n = 35 * w
    if move == 3:
        n = 40 * w
        
if bmi < 18.5 :
    if move == 1:
        n = 35 * w
    if move == 2:
        n = 40 * w
    if move == 3:
        n = 45 * w

print("BMI為{}".format(bmi))
print("每日所需熱量{}".format(n))