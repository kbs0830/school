areacode={"A":10,"B":11,"C":12,"D":13,'E':14,'F':15,'G':16,'H':17,'I':34,'J':18,'K':19,'L':20,'M':21,'N':22,'O':35,'P':23,'Q':24,'R':25,'S':26,'T':27,'U':28,'V':29,'W':32,'X':30,'Y':31,'Z':33}
id=input("請輸入身份證字號")
if len(id) !=10 :
    print("錯誤")#判斷 10 碼
firstchar=id[0]
if firstchar not in areacode:
    print("錯誤")#判斷英文開頭
arean=areacode[firstchar]
areatotal=arean//10+(arean%10)*9
a=int(id[1])*8
b=int(id[2])*7
c=int(id[3])*6
d=int(id[4])*5
e=int(id[5])*4
f=int(id[6])*3
g=int(id[7])*2
h=int(id[8])*1
i=int(id[9])
nsum=areatotal+a+b+c+d+e+f+g+h+i
if nsum %10==0:
    print("正確")
else:
    print("錯誤")