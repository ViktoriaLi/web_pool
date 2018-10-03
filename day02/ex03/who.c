#include <stdio.h>
 
#include <utmp.h>
// собственно здесь лежит
#include <fcntl.h>
// следующие три

#include <unistd.h>
 
#include <stdlib.h>

void show_info(struct utmp* buf);// эта

int main(){ 
struct utmp current_record;// буффер для

int utmpfd;// дескриптор файла 
int reclen=sizeof(current_record);// размер

if((utmpfd=open(WTMP_FILE,O_RDONLY))==-1){// пытаемся

perror(UTMP_FILE);// если не

exit(1); 
} 
while(read(utmpfd,current_record,reclen)==reclen)//
show_info(current_record); 
close(utmpfd);// закрываем файл 
return 0; 
} 
void show_info(struct utmp* buf){ 
printf("%-8.8s ",buf->ut_name);// выравниваем
printf("%-8.8s ",buf->ut_line);// название

printf("%10ld ",buf->ut_time);
/* 
этого поля нет в структуре,
но если посмотреть в заголовочный файл, то
можно увидеть такую строку: # define ut_time ut_tv.tv_sec,
по сути говоря она просто достаёт значение
tv_sec, из структуры ut_tv. Если вы не найдёте
этой и др. инфы в заголовочном файле utmp.h, то
посмотрите в файлы, которые он include’ит. 
*/ 