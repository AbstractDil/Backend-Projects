#include <stdio.h>

// Solid Rectangle Program

int main(){

    // define variables for rows and columns
    int rows,col;
   // get user input
    printf("Enter number of rows: ");
    scanf("%d",&rows);
    printf("Enter number of columns: ");
    scanf("%d",&col);

    // print pattern
    for (int i = 0; i < rows; i++) 
    // outer loop for rows
    {
        for (int j = 0; j < col; j++) 
        // inner loop for columns
        {
            printf("* ");
        }
        printf("\n");
    }

    /**
     * Alternative method 
     */

    /*
    // print solid rectangle
    for (int i = 1; i <= rows; i++) 
    // outer loop for rows
    {
        for (int j = 1; j <= col; j++) 
        // inner loop for columns
        {
            printf("* ");
        }
        printf("\n");
    }
    */


    

    return 0;
}


    /**
    * Example Output:
    * Enter number of rows: 4
    * Enter number of columns: 5
    * * * * *
    * * * * *
    * * * * *
    * * * * *
    */