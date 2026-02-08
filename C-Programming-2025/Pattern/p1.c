#include <stdio.h>
/*
 * Print the following pattern for given number of rows.
 * Enter number of rows: 5
 * 1
 * 1 2
 * 1 2 3
 * 1 2 3 4
 * 1 2 3 4 5
 */

int main()
{
    
    int rows;
    
    printf("Enter number of rows: ");
    scanf("%d",&rows);
  

    // print pattern
    for (int i = 1; i <= rows; i++) 
    // outer loop for rows
    {
        for (int j = 1; j <= i; j++) 
        // inner loop for columns
        {
            //printf("* ");
            printf("%d ",j);
        }
        printf("\n");
    }

    return 0;
}
