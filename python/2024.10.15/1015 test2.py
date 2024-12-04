year = int(input("請輸入年紀："))
if year >= 18:
    print("限制級")
elif year >= 15:
    print("輔導15級")
elif year >= 12:
    print("輔導12級")
elif year >= 6:
    print("保護級")
else:
    print("普遍級")
    
point = int(input("請輸入成績："))
if 100 >= point >= 90:
    print("A")
elif point >= 80:
    print("B")
elif point >= 70:
    print("C")
elif point >= 60:
    print("D")
elif point <= 59:
    print("Fail")
else:
    print("error")
    
h = float(input('請輸入身高：'))/100
w = float(input('請輸入體重：'))
bmi =(w / (h * h))
if bmi < 18.5:
    print("過輕")
elif bmi>=18.5 and bmi<=25:
    print("正常")
else:
    print("過重")

