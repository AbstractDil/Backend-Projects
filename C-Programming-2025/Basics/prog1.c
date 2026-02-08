#include <stdio.h>

int main()
{
    int a = 10;

    // Undefined behavior due to multiple modifications of 'a' without an intervening sequence point
    printf("%d,%d,%d,%d\n", a++, ++a, a--, --a);

    //printf("%d \n", --a);
    //printf("%d \n", a--);
    //printf("%d \n", a++);
    //printf("%d \n", ++a);



    printf("%d \n", a);



    return 0;
}

/**
 * output: 9,10,9,10 and 10 
 * 
 */
