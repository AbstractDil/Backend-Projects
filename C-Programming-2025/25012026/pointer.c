#include <stdio.h>

int main(){

    int a = 10, b = 20,c;
    

    printf("Address of a: %p\n", (void*)&a);
    printf("Value of a: %d\n", a);

    printf("Address of b: %p\n", (void*)&b);
    printf("Value of b: %d\n", b);

    int *p = &a;
    printf("Address stored in pointer p: %p\n", (void*)p);
    printf("Value pointed to by p: %d\n", *p);

    int *q = &b;
    printf("Address stored in pointer q: %p\n", (void*)q);
    printf("Value pointed to by q: %d\n", *q);

     // addition
    
    c = *p + *q;
    printf("Sum is %d\n", c);

    return 0;
}
