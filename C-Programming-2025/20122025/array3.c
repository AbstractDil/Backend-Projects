#include <stdio.h>

// Give an array of marks of 10 students, if the marks of any student is less than 35, print its roll number. [here roll number refers to index of array]


int main(){
    int marks[10] = {45, 32, 67, 29, 50, 80, 22, 90, 33, 55};

    for(int i = 0; i < 10; i++){
        if(marks[i] < 35){
            printf("Student with roll number %d has failed.\n", i);
        }
    }

    printf("\n");

    // take input of 5 students marks and print them
    int inputMarks[10];
    printf("Enter marks of 10 students: \n");
    for(int i = 0; i < 10; i++){
        printf("Student %d: ", i+1);
        scanf("%d", &inputMarks[i]);
    }

    printf("You entered: ");
    for(int i = 0; i < 10; i++){
        printf("%d ", inputMarks[i]);
    }
    printf("\n");

    // check which students have less than 35 marks
    for(int i = 0; i < 10; i++){
        if(inputMarks[i] < 35){
            printf("Student with roll number %d has failed.\n", i);
        }
    }

    return 0;
}