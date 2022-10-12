
from tkinter import *
import mysql.connector
mydb = mysql.connector.connect(host="localhost",user="root",password="",database="mibaseaaronlimachi")

cursor=mydb.cursor()
query="select CASE per.departamento WHEN '01' then 'Chuquisaca' WHEN '02' then 'La Paz' WHEN '03' then 'Cochabamba' WHEN '04' then 'Oruro' WHEN '05' then 'Potosí' WHEN '06' then 'Tarija' WHEN '07' then 'Santa Cruz' WHEN '08' then 'Beni' WHEN '09' then 'Pando' else 'null' END departamento,AVG(ins.nota_final) media from persona per, inscripcion ins where per.ci=ins.ci_estudiante GROUP BY per.departamento;"
cursor.execute(query)
response=cursor.fetchall()

total=int(0)
ventana=Tk()
ventana.config(bg="#CFFF8D")
ventana.geometry("500x400")

miFrame=Frame(ventana)
miFrame.pack(side=LEFT, anchor=CENTER)
miFrame.config(bg="#CFFF8D")
miFrame.config(relief="ridge")
miFrame.config(border="1px")
miFrame.place(x="2",y="140")
campo_media=Label(ventana,text="MEDIA DE NOTAS" ,bg="#CFFF8D",font=20,fg="#425F57")
campo_media.place(x="180",y="40")

campo_departamento=Label(ventana,text="Departamento" ,bg="#CFFF8D",font=20,fg="#425F57")
campo_departamento.place(x="2",y="110")
campo_promedio=Label(ventana,text="Promedio" ,bg="#CFFF8D",font=20,fg="#425F57")
campo_promedio.place(x="300",y="110")
      
for i in range(len(response)): 
    for j in range(2): 
          
        e = Entry(miFrame, width=24,bg="#A8E890", fg='black', 
                       font=('Arial',16,'bold')) 
        e.grid(row=i, column=j) 
        e.insert(END, response[i][j])  


cursor.close() 
mydb.close() 

ventana.mainloop()